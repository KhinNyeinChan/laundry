<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{

    function __construct() {
        parent::__construct();


        if (!$this->loggedIn) {
            redirect('login');
        }

        $this->load->library('form_validation');
        $this->load->model('categories_model');
    }

    function index() {

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['orders'] = $this->site->getAllCategories();
        $this->data['page_title'] = lang('order_details');
        $bc = array(array('link' => '#', 'page' => lang('order_details')));
        $meta = array('page_title' => lang('order_details'), 'bc' => $bc);
        $this->page_construct('orders/index', $this->data, $meta);

    }
    public function status() {
        if ( ! $this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect('sales');
        }
        $this->form_validation->set_rules('sale_id', lang('sale_id'), 'required');
        $this->form_validation->set_rules('status', lang('status'), 'required');

        if ($this->form_validation->run() == true) {

            $this->sales_model->updateStatus($this->input->post('sale_id', TRUE), $this->input->post('status', TRUE));
            $this->session->set_flashdata('message', lang('status_updated'));
            redirect('sales');

        } else {

            $this->session->set_flashdata('error', validation_errors());
            redirect('sales');

        }
    }

   function get_orders() {

        $this->load->library('datatables');
        $this->datatables->select($this->db->dbprefix('orders').".id as id, DATE_FORMAT(start_date, '%Y-%m-%d %H:%i') as date,customer_name,".$this->db->dbprefix('order_items').".product_code,product_name,status,responsible_person,reason", FALSE);
        $this->datatables->from('orders')
        ->join('order_items', 'orders.id=order_items.order_id', 'right');
       // $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> <a href='" . site_url('orders/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_category') . "')\" title='" . lang("delete_category") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();


    } 
   
    function list_orders() {
        
  $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['orders'] = $this->site->getAllCategories();
        $this->data['page_title'] = lang('orders');
        $bc = array(array('link' => '#', 'page' => lang('orders')));
        $meta = array('page_title' => lang('orders'), 'bc' => $bc);
        $this->page_construct('orders/list_orders', $this->data, $meta);
    } 

     function get_list_orders() {

   $this->load->library('datatables');
        $this->datatables->select($this->db->dbprefix('orders').".id as id,DATE_FORMAT(start_date, '%Y-%m-%d %H:%i') as date,customer_name,total_items,total_quantity,".$this->db->dbprefix('users').".username", FALSE);
     $this->datatables->from('orders');
       $this->datatables->join('users', 'users.id=orders.created_by', 'left');
      //  $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'> <a href='" . site_url('orders/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_category') . "')\" title='" . lang("delete_category") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();

    }
    public function delete($id) {
         if(DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }
        if (!$this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

         if ($this->db->delete('orders', array('id' => $id)) && 
            $this->db->delete('order_items', array('order_id' => $id))) {
             $this->session->set_flashdata('message', lang("order_deleted"));
            redirect('orders');
            return true;
        }
        return FALSE;     
    }
    
	function getcategoriesJSON(){
           echo json_encode($this->categories_model->getAllCategories());
         } 
	
}

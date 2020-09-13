<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('report_model');
       $this->load->model('login_model');
       $this->load->model('common_model');
     $this->load->model('customer_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Reports';
       
        $data['main_content'] = $this->load->view('admin/report/sale_report', $data, TRUE);
         $data['main_content'] = $this->load->view('admin/report/sale_details_report', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    

    public function all_sale_report_list()
    {
        $data['salereport'] = $this->report_model->get_all_salereport();
        $data['customer'] = $this->customer_model->select('customer');
        $data['user'] = $this->common_model->select('user');
        $data['count'] = $this->report_model->get_sale_report_total();
        $data['main_content'] = $this->load->view('admin/report/sale_report', $data, TRUE);
        //$data['main_content'] = $this->load->view('admin/sale/openbill', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function all_sale_details_report_list()
    {
        $data['detailreport'] = $this->report_model->get_all_salereport();
       // $data['category'] = $this->product_model->select('category');
        $data['count'] = $this->report_model->get_sale_report_total();
        //$data['main_content'] = $this->load->view('admin/sale/listsale', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/report/sale_details_report', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    //-- update products info
    /*public function update($id)
    {
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            );
            $data = $this->security->xss_clean($data);

            $this->product_model->edit_option($data, $id, 'product');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/product/all_product_list'));

        }

        $data['product'] = $this->product_model->get_single_product_info($id);
        $data['category'] = $this->product_model->select('category');
        $data['main_content'] = $this->load->view('admin/product/edit_product', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    //-- delete product
    public function delete($id)
    {
        $this->product_model->delete($id,'product'); 
        $this->session->set_flashdata('msg', 'Product deleted Successfully');
        redirect(base_url('admin/product/all_product_list'));
    }*/
   function sale_report(){
        $customer = $this->input->get('customer') ? $this->input->get('customer') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
        $user = $this->input->get('user') ? $this->input->get('user') : NULL;

        $data['salereport'] = $this->report_model->select_sales($customer,$start_date,$end_date,$user);
        $data['main_content'] = $this->load->view('admin/report/sale_report', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

      function sale_details_report(){
       // $customer = $this->input->get('customer') ? $this->input->get('customer') : NULL;
        $start_date = $this->input->get('start_date') ? $this->input->get('start_date') : NULL;
        $end_date = $this->input->get('end_date') ? $this->input->get('end_date') : NULL;
       // $user = $this->input->get('user') ? $this->input->get('user') : NULL;

        $data['detailreport'] = $this->report_model->select_detailsale($start_date,$end_date);
        $data['main_content'] = $this->load->view('admin/report/sale_details_report', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
        
       /* $query = $this->db->query("SELECT * FROM sale");
        if($customer) { $this->db->where('customer_id', $customer); }
        if($user) { $this->db->where('created_by', $user); }
        if($start_date) { $this->db->where('pay_date >=', $start_date); }
        if($end_date) { $this->db->where('pay_date <=', $end_date); }

       
        $query = $query->result_array();  
        return $query;*/


    /*if ($_GET) {
            $customer=$_GET['customer'],
            $user=$_GET['user'],
            $start_date=$_GET['start_date'],
            $end_date=$_GET['end_date']
    
    
        }*/
}
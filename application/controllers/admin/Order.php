<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->database();
       $this->load->model('Order_model');
       $this->load->model('Login_model');
    }

    public function index()
    {
        $data = array();
        $data['page_title'] = 'Orders';
        $data['main_content'] = $this->load->view('admin/order/orders', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

      // public function savedata()
      // {
      //    //load registration view form
      //    $this->load->view('admin/order/addOrder');
    
      //     //Check submit button 
      //     if($this->input->post('save'))
      //     {
      //     //get form's data and store in local varable
      //     $sd=$this->input->post('start_date');
      //     $ed=$this->input->post('end_date');
      //     $pc=$this->input->post('product_code');
      //     $cn=$this->input->post('customer_name');
      //     $cb=$this->input->post('created_by');
      //     $tq=$this->input->post('total_qty');
      //     $ti=$this->input->post('total_item');
      //     $pn=$this->input->post('product_name');
      //     $st=$this->input->post('status');
      //     $q=$this->input->post('quantity');
      //     $mt=$this->input->post('modified_time');
      //     $mb=$this->input->post('modified_by');
      //     $at=$this->input->post('assign_to');
      //     $this->Order_model->saverecords($sd,$ed,$pc,$cn,$cb,$tq,$ti,$pn,$st,$q,$mt,$mb,$at); 
      //     $this->session->set_flashdata('msg', 'Order added Successfully');
      //             redirect(base_url('admin/order/all_order_list'));
      //     }
      // }


//-- update products info
   /* public function assign()
    {
        //Check submit button 
        if($this->input->post('save'))
        {
        //get form's data and store in local varable
        $sd=$this->input->post('start_date');
        $ed=$this->input->post('end_date');
        $pc=$this->input->post('product_code');
        $cn=$this->input->post('customer_name');
        $cb=$this->input->post('created_by');
        $tq=$this->input->post('total_qty');
        $ti=$this->input->post('total_item');
        $pn=$this->input->post('product_name');
        $st=$this->input->post('status');
        $q=$this->input->post('quantity');
        $mt=$this->input->post('modified_time');
        $mb=$this->input->post('modified_by');
        $at=$this->input->post('assign_to');
        
        $this->Order_model->saveassign($sd,$ed,$pc,$cn,$cb,$tq,$ti,$pn,$st,$q,$mt,$mb,$at); 
        $this->session->set_flashdata('msg', 'Assign added Successfully');
                redirect(base_url('admin/order/all_order_list'));
        }
    }*/
    //-- add new user by admin
   /* public function savedata()
    {   
        if ($_POST) {

            $data = array(
                'start_date' =>  $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'product_code' => $_POST['product_code'],
                'customer_name' => $_POST['customer_name'],
                'created_by' => $_POST['created_by'],
                'total_qty' => $_POST['total_qty'],
                'total_item' => $_POST['total_item'],
                'product_name' => $_POST['product_name'],
                'status' => $_POST['status'],
                'quantity' => $_POST['quantity'],
                'modified_time' => $_POST['modified_time'],
                'modified_by' => $_POST['modified_by'],
                'assign_to' => $_POST['assign_to']   
            );

            $data = $this->security->xss_clean($data);

            if (empty($email)) {
                $orders_id = $this->Order_model->insert($data, 'orders');
            
                if ($this->input->post('role') == "user") {
                    $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'orders_id' => $orders_id,
                            'action' => $value
                        ); 
                       $role_data = $this->security->xss_clean($role_data);
                       $this->Order_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Order added Successfully');
                redirect(base_url('admin/order/all_order_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/order'));
            }
        }
    }

*/
 //-- add new user by admin
     public function savedata()
    {   

        if ($_POST) {

            $data1 = array(
                 
                'id' => $_POST['id'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'total_qty' => $_POST['total_qty'],
                'total_item' => $_POST['total_item'],
                'status' => $_POST['status'],
                'customer_name' => $_POST['customer_name'],
                'created_by' => $_POST['created_by'],
                 'assign_to' => $_POST['assign_to']
             );
            $data2 = array(
                'order_id' => $_POST['order_id'],
                'status' => $_POST['status'], 
                'created_by' => $_POST['created_by'],      
                'customer_name' => $_POST['customer_name'],
                'quantity' => 1,
                'product_id' => $_POST['product_id'],
                'product_code' => $_POST['product_code'],
                'product_name' => $_POST['product_name'],
                'assign_to' => $_POST['assign_to']     
            );
              //$order_id = $this->Order_model->saverecords($data1, 'orders');
              //$order_items_id = $this->Order_model->saverecords($data2, 'order_items');
              $order_id = $this->Order_model->saverecords($data1,$data2); 
              $this->session->set_flashdata('msg', 'Order added Successfully');
              redirect(base_url('admin/order/all_order_list'));
        }
}

    //-- update products info
    public function add_assign($id)
    {
       //$this->form_validation->set_rules('name' , 'Name' , 'required');

            $data = array(
                'assign_to' => $this->input->post('name'),
            );
            $data = $this->security->xss_clean($data);
            $order_otems_id = $this->Order_model->update($data, $id, 'order_items');
            $this->session->set_flashdata('msg', 'Assign Add Successfully');
            redirect(base_url('admin/order/all_order_item'));
 }
    public function all_order_list()
    {
        $data['page_title'] = 'Orders';
        $data['orders'] = $this->Order_model->get_all_order();
        $data['main_content'] = $this->load->view('admin/order/orders', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function all_order_item()
    {
        $data['page_title'] = 'Order Details';
        $data['orderdetails'] = $this->Order_model->get_all_order_item();
        $data['main_content'] = $this->load->view('admin/order/orderdetail', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

}
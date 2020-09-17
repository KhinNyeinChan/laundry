<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('customer_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Add Customer';
       // $data['country'] = $this->common_model->select('country');
       // $data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/customer/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'customfield' => $_POST['customfield']
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $customer_id = $this->customer_model->insert($data, 'customer');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'customer_id' => $customer_id,
                            'action' => $value
                        ); 
                      // $role_data = $this->security->xss_clean($role_data);
                      // $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Customer added Successfully');
                redirect(base_url('admin/customer/all_customer_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/customer'));
            }
        }
    }

    public function all_customer_list()
    {
        $data['page_title'] = 'Customers';
        $data['customers'] = $this->customer_model->get_all_customer();
        $data['count'] = $this->customer_model->get_customer_total();
        $data['main_content'] = $this->load->view('admin/customer/customers', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'customfield' => $_POST['customfield']
            );
            $data = $this->security->xss_clean($data);


            $this->customer_model->edit_option($data, $id, 'customer');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/customer/all_customer_list'));

        }

        $data['page_title'] = 'Update Customer';
        $data['customer'] = $this->customer_model->get_single_customer_info($id);
        $data['main_content'] = $this->load->view('admin/customer/edit_customer', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    

    //-- delete user
    public function delete($id)
    {
        $this->customer_model->delete($id,'customer'); 
        $this->session->set_flashdata('msg', 'Customer deleted Successfully');
        redirect(base_url('admin/customer/all_customer_list'));
    }



}
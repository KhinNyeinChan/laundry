<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('store_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Add Store';
        $data['main_content'] = $this->load->view('admin/store/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new stores by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postal_code' => $_POST['postal_code'],
                'country' => $_POST['country'],
                'receipt_header' => $_POST['receipt_header'],
                'receipt_footer' => $_POST['receipt_footer']  
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $store_id = $this->store_model->insert($data, 'store');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'store_id' => $store_id,
                            'action' => $value
                        ); 
                      // $role_data = $this->security->xss_clean($role_data);
                      // $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Store added Successfully');
                redirect(base_url('admin/store/all_store_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/store'));
            }
            
            
            

        }
    }

    public function all_store_list()
    {
        $data['page_title'] = 'Store';
        $data['stores'] = $this->store_model->get_all_store();
        //$data['count'] = $this->common_model->get_category_total();
        $data['main_content'] = $this->load->view('admin/store/stores', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update stores info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postal_code' => $_POST['postal_code'],
                'country' => $_POST['country'],
                'receipt_header' => $_POST['receipt_header'],
                'receipt_footer' => $_POST['receipt_footer']  
            );
            $data = $this->security->xss_clean($data);


            $this->store_model->edit_option($data, $id, 'store');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/store/all_store_list'));

        }

        $data['page_title'] = 'Update Store';
        $data['store'] = $this->store_model->get_single_store_info($id);
        $data['main_content'] = $this->load->view('admin/store/edit_store', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    


    //-- delete store
    public function delete($id)
    {
        $this->store_model->delete($id,'store'); 
        $this->session->set_flashdata('msg', 'Store deleted Successfully');
        redirect(base_url('admin/store/all_store_list'));
    }



}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('category_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Add Category';
        $data['main_content'] = $this->load->view('admin/category/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new category by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'code' => $_POST['code'],
                'name' => $_POST['name']  
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $category_id = $this->category_model->insert($data, 'category');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'category_id' => $category_id,
                            'action' => $value
                        ); 
                      // $role_data = $this->security->xss_clean($role_data);
                      // $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Category added Successfully');
                redirect(base_url('admin/category/all_category_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/category'));
            }
            
            
            

        }
    }

    public function all_category_list()
    {
        $data['page_title'] = 'Categories';
        $data['categories'] = $this->category_model->get_all_category();
        $data['count'] = $this->category_model->get_category_total();
        $data['main_content'] = $this->load->view('admin/category/categories', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update categories info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'code' => $_POST['code'],
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);


            $this->category_model->edit_option($data, $id, 'category');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/category/all_category_list'));

        }

        $data['page_title'] = 'Update Category';
        $data['category'] = $this->category_model->get_single_category_info($id);
        $data['main_content'] = $this->load->view('admin/category/edit_category', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    


    //-- delete category
    public function delete($id)
    {
        $this->category_model->delete($id,'category'); 
        $this->session->set_flashdata('msg', 'Category deleted Successfully');
        redirect(base_url('admin/category/all_category_list'));
    }



}
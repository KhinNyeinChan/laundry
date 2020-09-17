<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense_Category extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('expense_category_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Add Expense Category';
        $data['main_content'] = $this->load->view('admin/expense_category/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new category by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'name' => $_POST['name']  
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $expense_category_id = $this->expense_category_model->insert($data, 'expense_category');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'expense_category_id' => $expense_category_id,
                            'action' => $value
                        ); 
                      // $role_data = $this->security->xss_clean($role_data);
                      // $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Expense Category added Successfully');
                redirect(base_url('admin/expense_category/all_expense_category_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/expense_category'));
            }
            
            
            

        }
    }

    public function all_expense_category_list()
    {
        $data['page_title'] = 'Expense Categories';
        $data['expense_categories'] = $this->expense_category_model->get_all_expense_category();
        $data['count'] = $this->expense_category_model->get_expense_category_total();
        $data['main_content'] = $this->load->view('admin/expense_category/expense_categories', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update categories info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);


            $this->expense_category_model->edit_option($data, $id, 'expense_category');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/expense_category/all_expense_category_list'));

        }

        $data['page_title'] = 'Update Expense Category';
        $data['expense_category'] = $this->expense_category_model->get_single_expense_category_info($id);
        $data['main_content'] = $this->load->view('admin/expense_category/edit_expense_category', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    


    //-- delete category
    public function delete($id)
    {
        $this->expense_category_model->delete($id,'expense_category'); 
        $this->session->set_flashdata('msg', 'Expense Category deleted Successfully');
        redirect(base_url('admin/expense_category/all_expense_category_list'));
    }



}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expense extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('expense_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Expense';
        $data['expense_category'] = $this->expense_model->select('expense_category');
        $data['expenses'] = $this->expense_model->get_all_expense();
        $data['main_content'] = $this->load->view('admin/expense/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new category by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'date' => $_POST['date'],
                'reference' => $_POST['reference'],                
                'amount' => $_POST['amount'],
                'note' => $_POST['note'],
                'id' => $_POST['id'],
                'expense_category' => $_POST['expense_category'],
                'attachment' => $_POST['attachment']
                
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $expense_id = $this->expense_model->insert($data, 'expense');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'expense_id' => $expense_id,
                            'action' => $value
                        ); 
                       //$role_data = $this->security->xss_clean($role_data);
                       //$this->expense_model->insert($role_data, 'expense_role');
                    }
                }
                $this->session->set_flashdata('msg', 'Expense added Successfully');
                redirect(base_url('admin/expense/all_expense_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/expense'));
            }
            
            
            

        }
    }

    public function all_expense_list()
    {
        $data['expenses'] = $this->expense_model->get_all_expense();
        $data['expense_category'] = $this->expense_model->select('expense_category');
        $data['count'] = $this->expense_model->get_expense_total();
        $data['main_content'] = $this->load->view('admin/expense/expenses', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update categories info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'date' => $_POST['date'],
                'reference' => $_POST['reference'],                
                'amount' => $_POST['amount'],
                'note' => $_POST['note'],
                
                'expense_category' => $_POST['expense_category'],
                'attachment' => $_POST['attachment']
                
            );
            $data = $this->security->xss_clean($data);

            //$powers = $this->input->post('role_action');
            if (!empty($email)) {
                $this->expense_model->insert($data, 'expense');
                foreach ($actions as $value) {
                   $role_data = array(
                        'expense_id' => $expense_id,
                        'action' => $value
                    ); 
                  // $role_data = $this->security->xss_clean($role_data);
                  // $this->expense_model->insert($role_data, 'expense_role');
                }
            }

            $this->expense_model->edit_option($data, $id, 'expense');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/expense/all_expense_list'));

        }

        $data['expense'] = $this->expense_model->get_single_expense_info($id);
        $data['expense_category'] = $this->expense_model->select('expense_category');
        $data['main_content'] = $this->load->view('admin/expense/edit_expense', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }
    
        //-- delete category
    public function delete($id)
        {
           $this->expense_model->delete($id,'expense'); 
           $this->session->set_flashdata('msg', 'Expense deleted Successfully');
           redirect(base_url('admin/expense/all_expense_list'));
        }
    
}
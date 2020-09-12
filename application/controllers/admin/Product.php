<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('product_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Product';
        $data['category'] = $this->product_model->select('category');
        $data['main_content'] = $this->load->view('admin/product/add', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    //-- add new product by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price']
                
                //'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);
            
            //-- check duplicate email
          // $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
              $product_id = $this->product_model->insert($data, 'product');
            
                if ($this->input->post('role') == "admin") {
                  $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'product_id' => $product_id,
                            'action' => $value
                        ); 

                    }
                }
                
                $this->session->set_flashdata('msg', 'Product added Successfully');
                redirect(base_url('admin/product/all_product_list'));
            } 
            else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/product'));
            }
            
            
            

        }
    }

    public function all_product_list()
    {
        $data['products'] = $this->product_model->get_all_product();
        $data['category'] = $this->product_model->select('category');
        $data['count'] = $this->product_model->get_product_total();
        $data['main_content'] = $this->load->view('admin/product/products', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update products info
    public function update($id)
    {
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price']
                
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
    }

}
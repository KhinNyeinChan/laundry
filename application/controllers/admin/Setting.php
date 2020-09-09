<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('setting_model');
       $this->load->model('login_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Setting';
       // $data['category'] = $this->common_model->select('category');
        $data['main_content'] = $this->load->view('admin/setting', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    public function updateSetting(){

        if($_POST){
            $data = array(
                'site_name' => $_POST['site_name'],
               // 'rounding' => $_POST['rounding'],
                'display_product' => $_POST['display_product'],
                'phone' => $_POST['phone'],
                'currency_prefix' => $_POST['currency_prefix'],
                'default_discount' => $_POST['default_discount'],
                'default_tax_rate' => $_POST['default_tax_rate'],
                'default_email' => $_POST['default_email'],
                'default_customer' => $_POST['default_customer'],
                 'default_category' => $_POST['default_category'],
                'timeformat' => $_POST['timeformat'],
                'dateformat' => $_POST['dateformat'],
                'service_charges' => $_POST['service_charges'],
                'decimals' => $_POST['decimals'],
                'qty_decimals' => $_POST['qty_decimals'],
                'decimals_sep' => $_POST['decimals_sep'],
                'thousands_sep' => $_POST['thousands_sep'],
                'logo' => $_POST['logo'],
                'printer' => $_POST['printer']
            );
            $data = $this->security->xss_clean($data);

            $this->setting_model->updateSetting($data, 'setting');
            $this->session->set_flashdata('msg', 'Setting Updated Successfully');
            redirect(base_url('admin/setting/updateSetting'));

        }

        // $cust_id = $_POST['customer_id'];
        // $cat_id = $_POST['category_id'];
        $data['settings'] = $this->setting_model->getAllSetting();
        $data['customers'] = $this->setting_model->getAllCustomers();
         $data['categories'] = $this->setting_model->getAllCategories();
        $data['main_content'] = $this->load->view('admin/setting/updateSetting', $data, TRUE);
        $this->load->view('admin/index', $data);

    }

}
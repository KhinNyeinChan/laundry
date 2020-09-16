<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model('login_model');
    }

    public function index(){
        
    }

    public function printInvoice($orderId){
        $data = array();
        $data['store'] = $this->common_model->select('store');
        $data['date'] = $this->common_model->select_option($orderId,'orders')[0];
        $saleId= $this->common_model->get_saleId($orderId);
        $data['saleItems'] = $this->common_model->select_by_saleId($saleId[0]['id'],'sale_items');
        $data['payment'] = $this->common_model->select_by_saleId($saleId[0]['id'],'payment')[0];
        $data['sale'] = $this->common_model->select_by_orderId($orderId,'sale')[0];
        $this->load->view('admin/invoice',$data);
    }
}
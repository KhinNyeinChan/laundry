<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {
    public function index(){
        $data = array();
        $data['store'] = $this->common_model->select('store');
        $data['main_content'] = $this->load->view('admin/invoice', $data, TRUE);
        $this->load->view('admin/index',$data);
    }
}
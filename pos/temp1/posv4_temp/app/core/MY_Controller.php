<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->Settings = $this->site->getSettings();
        if($spos_language = $this->input->cookie('spos_language', TRUE)) {
            $this->Settings->selected_language = $spos_language;
            $this->config->set_item('language', $spos_language);
            $this->lang->load('app', $spos_language);
        } else {
            $this->Settings->selected_language = $this->Settings->language;
            $this->config->set_item('language', $this->Settings->language);
            $this->lang->load('app', $this->Settings->language);
        }
        $this->Settings->pin_code = $this->Settings->pin_code ? md5($this->Settings->pin_code) : NULL;
        $this->theme = $this->Settings->theme.'/views/';
        $this->data['assets'] = base_url() . 'themes/default/assets/';
        $this->data['Settings'] = $this->Settings;
        $this->loggedIn = $this->tec->logged_in();
        $this->data['loggedIn'] = $this->loggedIn;
        $this->data['store'] = $this->site->getStoreByID($this->session->userdata('store_id'));
        $this->data['categories'] = $this->site->getAllCategories();
        $this->Admin = $this->tec->in_group('admin') ? TRUE : NULL;
        $this->data['Admin'] = $this->Admin;
	//mod for manager role by Nyi Nyi on 3rd Aug 2017
	$this->Manager = $this->tec->in_group('manager') ? TRUE : NULL;
        $this->data['Manager'] = $this->Manager;
	//end mod 
	$this->Staff = $this->tec->in_group('staff') ? TRUE : NULL;
        $this->data['Staff'] = $this->Staff;
	//mod for waiter role by Nyi Nyi on 23rd Jan 2018
	$this->Waiter = $this->tec->in_group('waiter') ? TRUE : NULL;
        $this->data['Waiter'] = $this->Waiter;
	//end mod 
    //mod for mobile_caisher role by MTK on 29rd April 2019
    $this->Mobile_Caisher = $this->tec->in_group('mobile_caisher') ? TRUE : NULL;
        $this->data['Mobile_Caisher'] = $this->Mobile_Caisher;
    //end mod 
	
        $this->m = strtolower($this->router->fetch_class());
        $this->v = strtolower($this->router->fetch_method());
        $this->data['m']= $this->m;
        $this->data['v'] = $this->v;

    }

    function page_construct($page, $data = array(), $meta = array()) {
        if(empty($meta)) { $meta['page_title'] = $data['page_title']; }
        $meta['message'] = isset($data['message']) ? $data['message'] : $this->session->flashdata('message');
        $meta['error'] = isset($data['error']) ? $data['error'] : $this->session->flashdata('error');
        $meta['warning'] = isset($data['warning']) ? $data['warning'] : $this->session->flashdata('warning');
        $meta['ip_address'] = $this->input->ip_address();
        $meta['Admin'] = $data['Admin'];
	//mod for manager role by Nyi Nyi on 3rd Aug 2017
	$meta['Manager'] = $data['Manager'];
	//end mod 
	$meta['Staff'] = $data['Staff'];
	//mod for waiter role by Nyi Nyi on 23rd Jan 2018
	$meta['Waiter'] = $data['Waiter'];
	//end mod
    //mod for mobile_caisher role by MTK on 29rd April 2019
    $meta['Mobile_Caisher'] = $data['Mobile_Caisher'];
    //end mod  
        $meta['loggedIn'] = $data['loggedIn'];
        $meta['Settings'] = $data['Settings'];
        $meta['assets'] = $data['assets'];
        $meta['store'] = $data['store'];
        $meta['suspended_sales'] = $this->site->getUserSuspenedSales();
        $meta['qty_alert_num'] = $this->site->getQtyAlerts();
        $this->load->view($this->theme . 'header', $meta);
        $this->load->view($this->theme . $page, $data);
        $this->load->view($this->theme . 'footer');
    }

}

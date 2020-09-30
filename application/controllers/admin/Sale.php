<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('sale_model');
       $this->load->model('product_model');
       $this->load->model('login_model');
       $this->load->model('common_model');
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Sale';
       // $data['category'] = $this->product_model->select('category');
        $data['main_content'] = $this->load->view('admin/sale/listsale', $data, TRUE);
        //$data['main_content'] = $this->load->view('admin/sale/openbill', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }

    public function all_sale_list()
    {
        $data['page_title'] = 'Sale';
        $data['listsale'] = $this->sale_model->get_all_sale();
       // $data['category'] = $this->product_model->select('category');
        $data['store'] = $this->sale_model->select('store');
        $data['count'] = $this->sale_model->get_sale_total();
        $data['main_content'] = $this->load->view('admin/sale/listsale', $data, TRUE);
        // $data['main_content'] = $this->load->view('admin/sale/openbill', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function all_openBill_list()
    {
        $data['page_title'] = 'Opened Bills';
        $data['openbill'] = $this->sale_model->get_all_openbill();
       // $data['category'] = $this->product_model->select('category');
        //$data['count'] = $this->sale_model->get_openbill_total();
        //$data['main_content'] = $this->load->view('admin/sale/listsale', $data, TRUE);
        $data['main_content'] = $this->load->view('admin/sale/openbill', $data, TRUE);
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
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            );
            $data = $this->security->xss_clean($data);

            $this->product_model->edit_option($data, $id, 'product');
            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/product/all_product_list'));

        }

        $data['page_title'] = 'Edit Sale Product';
        $data['product'] = $this->product_model->get_single_product_info($id);
        $data['category'] = $this->product_model->select('category');
        $data['main_content'] = $this->load->view('admin/product/edit_product', $data, TRUE);
        $this->load->view('admin/index', $data);
        
    }

    //-- delete product
    public function delete($id)
    {
        $this->sale_model->delete($id,'sale'); 
        $this->session->set_flashdata('msg', 'Sale Information deleted Successfully');
        redirect(base_url('admin/sale/all_sale_list'));
    }
    // //Copied from Invoice.php for view sale
    //  public function printInvoice($orderId){
    //     $data = array();
    //     $data['store'] = $this->common_model->select('store');
    //     $data['date'] = $this->common_model->select_option($orderId,'orders')[0];
    //     $saleId= $this->common_model->get_saleId($orderId);
    //     $data['sale_items'] = $this->common_model->select_by_saleId($saleId[0]['id'],'sale_items');
    //     $data['payment'] = $this->common_model->select_by_saleId($saleId[0]['id'],'payment')[0];
    //     $data['sale'] = $this->common_model->select_by_orderId($orderId,'sale')[0];
    //     //$this->load->view('admin/invoice',$data);
    //     $this->load->view('admin/index', $data);
    // }

    // public function printOrderInvoice($orderId){
    //     $data = array();
    //     $data['store'] = $this->common_model->select('store');
    //     $data['orders'] = $this->common_model->select_option($orderId,'orders')[0];
    //     $customerId = $this->common_model->get_customerId($orderId);
    //     $data['customer'] = $this->common_model->select_option($customerId[0]['customer_id'],'customer')[0];
    //     $data['products'] = $this->common_model->select_by_orderId($orderId,'order_items');
    //     $this->load->view('admin/printOrderInvoice',$data);
    // }

}
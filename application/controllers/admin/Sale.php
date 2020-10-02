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

    //-- add new product by admin
   /* public function add()
    {   
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'code' => $_POST['code'],
                'category_id' => $_POST['category_id'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
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
    }*/

    public function all_sale_list()
    {
        $data['page_title'] = 'Sale';
        $data['listsale'] = $this->sale_model->get_all_sale();
       // $data['category'] = $this->product_model->select('category');
        $data['count'] = $this->sale_model->get_sale_total();
        $data['main_content'] = $this->load->view('admin/sale/listsale', $data, TRUE);
        // $data['main_content'] = $this->load->view('admin/sale/openbill', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function all_openBill_list()
    {
        $data['page_title'] = 'Opened Bills';
        $data['openbill'] = $this->sale_model->get_all_openbill();
        $data['sales'] = $this->common_model->select('sale');
        $data['saleItems'] = $this->common_model->select('sale_items');
        $data['stores'] = $this->common_model->select('store');
        $data['customers'] = $this->common_model->select('customer');
        $data['orderItems'] = $this->common_model->select('order_items');
        $data['payments'] = $this->common_model->select('payment');
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
        $this->product_model->delete($id,'product'); 
        $this->session->set_flashdata('msg', 'Product deleted Successfully');
        redirect(base_url('admin/product/all_product_list'));
    }

    //to store opened bill data for unpaid
    public function submitUnpaidBill(){
        $data = array(
            'openedBillData' => $this->input->post('openedBillData')
        );
        $data = json_decode($data['openedBillData']);
        $orderId = $data->filterOrder->id;
        $customerId = $data->customer->id;
        $customerName = $data->customer->name;
        $customerPhone = $data->customer->phone;
        $total = $data->filterOrder->total;
        $discount = $data->filterOrder->discount;
        $grandTotal = $data->filterOrder->subtotal;
        $totalItem = $data->filterOrder->total_item;
        $totalQty = $data->filterOrder->total_qty;
        $paid = $data->totalPaying;
        $createdBy = $this->session->userdata('name');
        $paymentStatus = "paid";
        $storeId = "1";
        $saleNote =$data->saleNote;
        $balance = $data->balance;
        $payingBy = $data->payingBy;
        $paymentNote = $data->paymentNote;
        $saleData = array(
            "order_id" => $orderId,
            "customer_id" => $customerId,
            "customer_name" => $customerName,
            "customer_phone" => $customerPhone,
            "total" => $total,
            "discount" => $discount,
            "grand_total" => $grandTotal,
            "total_item" => $totalItem,
            "total_quantity" => $totalQty,
            "paid" => $paid,
            "created_by" => $createdBy,
            "status" => $paymentStatus,
            "store_id" => $storeId,
            "note" => $saleNote,
            "balance" => $balance
        );
        $saleId = $this->common_model->insert($saleData, 'sale');
        $refNote = $data->filterOrder->ref_note;
        if($saleId != null){
            $orderItemArray = $data->filterOrderItem;
            for ($i=0; $i < count($orderItemArray); $i++) { 
                $element = $orderItemArray[$i];
                $saleItemData = array(
                    "sale_id" => $saleId,
                    "customer_id" => $customerId,
                    "customer_name" => $customerName,
                    "payment_status" => $paymentStatus,
                    "note" => $refNote,
                    "product_id" => $element->product_id ,
                    "quantity" => $element->quantity ,
                    "product_code" => $element->product_code,
                    "product_name" => $element->product_name,
                    "total" => $element->product_price,
                    "subtotal" => $element->subtotal 
                );
                $this->common_model->insert($saleItemData, 'sale_items');
            }
        }
        if($saleId != null){
            $paymentData = array(
                "sale_id" => $saleId,
                "customer_id" => $customerId,
                "paid_by" => $payingBy,
                "amount" => $grandTotal,
                "created_by" => $createdBy,
                "pos_paid" => $paid,
                "pos_balance" => $balance,
                "store_id" => $storeId,
                "status" => $paymentStatus,
                "note" => $paymentNote
            );
            $this->common_model->insert($paymentData, 'payment');
        }
        $updateOpenedData = array(
            "payment_status" => $paymentStatus
        );
        $this->common_model->edit_option($updateOpenedData, $orderId, 'orders');
        echo ($orderId);
    }

    //to store opened bill data for partial
    public function submitPartialBill(){
        $data = array(
            'openedPartialBillData' => $this->input->post('openedPartialBillData')
        );
        $data = json_decode($data['openedPartialBillData']);
        $orderId = $data->filterOrder->id;
        $totalPaying = $data->totalPaying;
        $paymentStatus = "paid";
        $saleNote =$data->saleNote;
        $balance = $data->balance;
        $payingBy = $data->payingBy;
        $paymentNote = $data->paymentNote;
        $saleId = $data->saleId;

        $updateOrderData = array(
            "payment_status" => $paymentStatus
        );
        $this->common_model->edit_option($updateOrderData, $orderId, 'orders');

        $updateSaleData = array(
            "status" => $paymentStatus,
            "paid" => $totalPaying,
            "note" => $saleNote,
            "balance" => $balance
        );
        $this->common_model->edit_option($updateSaleData, $saleId, 'sale');

        $saleItemArray = $data->filterSaleItem;
        for ($i=0; $i < count($saleItemArray); $i++) { 
            $updateSaleItemData = array(
                "payment_status" => $paymentStatus
            );
            $this->sale_model->edit_by_saleId($updateSaleItemData, $saleId, 'sale_items');
        }

        $updatePaymentData = array(
            "status" => $paymentStatus,
            "pos_paid" => $totalPaying,
            "pos_balance" => $balance,
            "note" => $paymentNote,
            "paid_by" => $payingBy
        );
        $this->sale_model->edit_by_saleId($updatePaymentData, $saleId, 'payment');
        echo ($orderId);
    }
}
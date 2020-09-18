<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
        $this->load->model('login_model');
    }
    
    public function index(){

        $data = array();
        $data['page_title'] = 'POS';
        $data['power'] = $this->common_model->get_all_power('user_power');
        $data['categories'] = $this->common_model->select('category');
        $data['products'] = $this->common_model->select('product');
       // $data['category_products'] = $this->common_model->getProductByCategoryID(1);
       // $data['product_item'] = $this->common_model->deleteStoreItems(1);
       // $data['product_item'] = array();
        $data['discountpercent'] = $this->common_model->select('discount')[0];
        $data['customers'] = $this->common_model->select('customer');

        $data['temp_category'] = ["Wash","Dry","Iron"];

        $data['main_content'] = $this->load->view('admin/pos/index', $data, TRUE);
        //  $data['main_content'] = $this->load->view('admin/pos/index_old', $data, TRUE);
       // $data['main_content'] = $this->load->view('admin/pos/pagination', $data, TRUE);
        $this->load->view('admin/index', $data);
        // redirect(base_url('admin/pos'));
    }

    // public function delete_items($id){

    //     $result = $this->common_model->delete_items($id);
    //     $this->loadItems(1,1);

    // }

    // public function loadItems($order_id,$category_id){
        
    //     $data = array();
    //     $data['page_title'] = 'POS';
    //     $data['power'] = $this->common_model->get_all_power('user_power');
    //     $data['categories'] = $this->common_model->select('category');
    //     // $data['products'] = $this->common_model->select('product');
    //     $data['category_products'] = $this->common_model->getProductByCategoryID($category_id);
    //     $data['discountpercent'] = $this->common_model->select('discount')[0];
    //     $data['product_item'] = $this->common_model->retrieve_items($order_id);
    //     $data['customers'] = $this->common_model->select('customer');
    //     $data['main_content'] = $this->load->view('admin/pos/index', $data, TRUE);
    //     //3$data['main_content'] = $this->load->view('admin/pos/pagination', $data, TRUE);
    //     $this->load->view('admin/index', $data);
    // }

    // public function get_category($category_id){
    //     $this->loadItems(1,$category_id);
    // }

    // public function get_categories($code){
    //     // $data['categories'] = $this->common_model->select('category');
    //     return true;
    // }


    // get product by id
    // public function get_product($code){

    //     $productCode = (int) $code;
    //     $item = $this->common_model->getProductByCode($productCode);

    //     $order_id =1;
    //     $item_id = $item[0]['id'];
    //     $name = $item[0]['name'];
    //     $code = $item[0]['code'];
    //     $category_id = $item[0]['category_id'];
    //     $price = $item[0]['price'];
    //     $quantity = $item[0]['quantity'];
    //     $qty = (int)$quantity;
    //     $total = $price * $quantity;

    //     if($quantity = $this->common_model->forQty($code)){
    //         $quantity = $quantity[0]['quantity'] +1;
    //         $qty = (int)$quantity;
    //         $total = $price * $qty;

    //         $item_id = $this->common_model->updateStoreItem($qty,$total,$code,$name);
    //     }else{
    //         // $qty = (int)$quantity;
    //         $data = array(
    //             'order_id' => $order_id,
    //             'item_id' => (int) $item_id,
    //             'code' => $code,
    //             'name' => $name,            
    //             'category_id' => (int)$category_id,
    //             'price' => (int)$price,
    //             'quantity' => $qty,
    //             'total' => $total
    //         );
    //         // store items to database
    //         $item_id = $this->common_model->addStoreItem($data);
    //     }

    //     $this->loadItems($order_id,$category_id);
    //     return true;
    // }
    // add customer
    public function add_customer(){
        if ($_POST) {

            $data = array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'customfield' => $_POST['customfield']
            );

            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data,'customer');
            redirect(base_url('admin/pos'));
 
        }
    }   

    //update discount
    public function updateDiscount(){
        $discount_data = array(

            'discount'=> $this->input->post("requestDiscountData")
    
        );
        $this->common_model->edit_option($discount_data,1,'discount');
        echo json_encode($discount_data);
    } 

    //print order
    public function printOrder(){
        $data = array(
            'printOrderData' => $this->input->post("printOrderData")
        );
        $data = json_decode($data['printOrderData']);
        $customerId = $data->customer->id;
        $customerName = $data->customer->name;
        $endDate = $data->pickupDate;
        $totalItem = $data->totalItem;
        $totalQty = $data->totalQty;
        $totalAmount = $data->totalAmount;
        $discount = $data->discount;
        $subtotal = $data->totalPayable;
        $payment_status = 'unpaid';
        $refNote = $data->refNote;
        $order_status ='received';
        $createdBy = $this->session->userdata('name');
        $orderData = array(
            "customer_id" => $customerId,
            "end_date" => $endDate,
            "total_qty" => $totalQty,
            "total_item" => $totalItem,
            "payment_status" => $payment_status,
            "created_by" => $createdBy,
            "customer_name" => $customerName,
            "ref_note" => $refNote,
            "order_status" => $order_status,
            "total" => $totalAmount,
            "discount" => $discount,
            "subtotal" => $subtotal
        );
        $orderID = $this->common_model->insert($orderData,'orders');
        if($orderID != NULL){
            $orderItemArray = $data->orderItemArray;
            for ($i=0; $i < count($orderItemArray); $i++) { 
                $element = $orderItemArray[$i];
                $orderItemData = array(
                    'order_id' => $orderID,
                    'product_id' => $element->product->id,
                    'quantity' => $element->quantity,
                    'product_code' => $element->product->code,
                    'product_name'=> $element->product->name,
                    'product_price' =>$element->product->price,
                    'status' => $order_status
                );
                $this->common_model->insert($orderItemData,'order_items');
            }
        }
        echo json_encode($orderID);
    }

    public function submitPayment(){
        $data = array(
            'paymentOrderData' => $this->input->post("paymentOrderData")
        );
        $data = json_decode($data['paymentOrderData']);
        $customerId = $data->customer->id;
        $customerName = $data->customer->name;
        $customerPhone = $data->customer->phone;
        $endDate = $data->pickupDate;
        $totalItem = $data->totalItem;
        $totalQty = $data->totalQty;
        $refNote = $data->refNote;
        $order_status ='received';
        $total = $data->totalAmount;
        $totalPayable = $data->totalPayable;
        $discount = $data->discount;
        $totalPaying = $data->totalPaying;
        $balance = $data->balance;
        $payingBy = $data->payingBy;
        $paymentNote = $data->paymentNote;
        $saleNote = $data->saleNote;
        $paymentStatus = $data->paymentStatus;
        $createdBy = $this->session->userdata('name');
        $store_id = "1";
        $orderData = array(
            "customer_id" => $customerId,
            "end_date" => $endDate,
            "total_qty" => $totalQty,
            "total_item" => $totalItem,
            "payment_status" => $paymentStatus,
            "created_by" => $createdBy,
            "customer_name" => $customerName,
            "ref_note" => $refNote,
            "order_status" => $order_status,
            "total" => $total,
            "discount" => $discount,
            "subtotal" => $totalPayable
        );
        $orderID = $this->common_model->insert($orderData,'orders');
        if($orderID != NULL){
            $orderItemArray = $data->orderItemArray;
            for ($i=0; $i < count($orderItemArray); $i++) { 
                $element = $orderItemArray[$i];
                $orderItemData = array(
                    'order_id' => $orderID,
                    'product_id' => $element->product->id,
                    'quantity' => $element->quantity,
                    'product_code' => $element->product->code,
                    'product_name'=> $element->product->name,
                    'product_price' =>$element->product->price,
                    'status' => $order_status
                );
                $this->common_model->insert($orderItemData,'order_items');
            }
        }
        $saleData = array(
            "order_id" => $orderID,
            "customer_id" => $customerId,
            "customer_name" => $customerName,
            "customer_phone" => $customerPhone,
            "total" => $total,
            "discount" => $discount,
            "grand_total" => $totalPayable,
            "total_item" => $totalItem,
            "total_quantity" => $totalQty,
            "paid" => $totalPaying,
            "created_by" => $createdBy,
            "status" => $paymentStatus,
            "store_id" => $store_id,
            "note" => $saleNote
        );
        $saleId = $this->common_model->insert($saleData, 'sale');
        if($saleId != null){
            $orderItemArray = $data->orderItemArray;
            for ($i=0; $i < count($orderItemArray); $i++) { 
                $element = $orderItemArray[$i];
                $saleItemData = array(
                    "sale_id" => $saleId,
                    "customer_id" => $customerId,
                    "customer_name" => $customerName,
                    "payment_status" => $paymentStatus,
                    "note" => $refNote,
                    "product_id" => $element->product->id,
                    "quantity" => $element->quantity,
                    "product_code" => $element->product->code,
                    "product_name" => $element->product->name,
                    "total" => $element->product->price,
                    "subtotal" => $element->subTotal
                );
                $this->common_model->insert($saleItemData, 'sale_items');
            }
        }
        if($saleId != null){
            $paymentData = array(
                "sale_id" => $saleId,
                "customer_id" => $customerId,
                "paid_by" => $payingBy,
                "amount" => $totalPayable,
                "created_by" => $createdBy,
                "pos_paid" => $totalPaying,
                "pos_balance" => $balance,
                "store_id" => $store_id,
                "status" => $paymentStatus,
                "note" => $paymentNote
            );
        }
        $this->common_model->insert($paymentData, 'payment');
        echo json_encode($orderID);
    }

}
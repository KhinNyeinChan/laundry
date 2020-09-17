<?php
class Common_model extends CI_Model {

    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);   
        return $this->db->insert_id();
    }

    public function getProductByCode($code){
        $this->db->select();
        $this->db->from('product');
        $this->db->where('id',$code);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    public function getProductByCategoryID($category_id){
        // print_r("Cat id".$category_id);
        $this->db->select();
        $this->db->from('product');
        $this->db->where('category_id',$category_id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

    public function addStoreItem($data){        
        $this->db->insert('store_product_items',$data);   
        return $this->db->insert_id();
    }
    public function updateStoreItem($quantity,$total,$code,$name){
        // print_r("QTY",$quantity);
        $this->db->where('name', $name);
        $this->db->where('code', $code);
        $this->db->set('quantity',$quantity);
        $this->db->set('total',$total);
        $this->db->update('store_product_items');
        return;
    }
    public function getTotal($order_id){
        $this->db->select();
        $this->db->from('store_product_items');
        $this->db->where('order_id',$order_id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    public function forQty($code){
        // $sql = "select COUNT(code) from store_product_items where order_id='$order_id' and code='$code'";
        // $query  = $this->db->query($sql);
        // $result = $query->result();
        // return $result;
        // $query = $this->db->select('store_produt_items',array('order_id',$order_id),array('code',$code));
        // return $query= $query->result();

        $this->db->select();
        $this->db->from('store_product_items');
        $this->db->where('code',$code);
        $query = $this->db->get();
        $query = $query->result_array();
        // $query = $query->result();
        return $query;
    }
    public function deleteStoreItems($id){
        # code...
        return $this->db->delete('store_product_items',array('order_id' => $id));
    }
    public function delete_items($id){
        return $this->db->delete('store_product_items', array('id' => $id));
        // $query = $this->db->get();
        // return $query->result_array();
    }

    public function saleCount($id){
        return $this->db->delete('store_product_items', array('id' => $id));
    }
    public function retrieve_items($order_id){    
        $this->db->select();
        $this->db->from('store_product_items');
        $this->db->where('order_id',$order_id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    //-- edit function
    function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- update function
    function update($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- delete function
    function delete($id,$table){
        $this->db->delete($table, array('id' => $id));
        return;
    }

    //-- user role delete function
    function delete_user_role($id,$table){
        $this->db->delete($table, array('user_id' => $id));
        return;
    }


    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- select by id
    function select_option($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 

    //-- check user role power
    function check_power($type){
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id', $this->session->userdata('id'));
        $this->db->where('ur.action', $type);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    public function check_email($email){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }

    public function check_exist_power($id){
        $this->db->select('*');
        $this->db->from('user_power');
        $this->db->where('power_id', $id); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }


    //-- get all power
    function get_all_power($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('power_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- get logged user info
    function get_user_info(){
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where('u.id',$this->session->userdata('id'));
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- get single user info
    function get_single_user_info($id){
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where('u.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    //-- get single user info
    function get_user_role($id){
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id',$id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //-- get all users with type 2
    function get_all_user(){
        $this->db->select('u.*');
        $this->db->select('c.name as country, c.id as country_id');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //-- count active, inactive and total user
    function get_user_total(){
        $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 1)
                            )
                            AS active_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 0)
                            )
                            AS inactive_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.role = "admin")
                            )
                            AS admin',TRUE);

        $this->db->from('user');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }


    //Adding Sale through payment button
    //Copied From iwavepos
    public function addSale($data, $items, $payment = array(), $did = NULL) {

        if($this->db->insert('sale', $data)) {
            $sale_id = $this->db->insert_id();

            foreach ($items as $item) {
                $item['sale_id'] = $sale_id;
                if($this->db->insert('sale_items', $item)) {
                    if ($item['product_id'] > 0 && $product = $this->site->getProductByID($item['product_id'])) {
                        if ($product->type == 'standard') {
                            $this->db->update('product_store_qty', array('quantity' => ($product->quantity - $item['quantity'] - $item['foc'])), array('product_id' => $product->id, 'store_id' => $data['store_id']));
                         } elseif ($product->type == 'combo') {
                            $combo_items = $this->getComboItemsByPID($product->id);
                             foreach ($combo_items as $combo_item) {
                                $cpr = $this->site->getProductByID($combo_item->id);
                                 //if($cpr->type == 'standard') {
                               if(($cpr->type == 'standard') || ($cpr->type == 'Raw')) {
                                     $qty = $combo_item->qty * $item['quantity'];
                                    $this->db->update('product_store_qty', array('quantity' => ($cpr->quantity-$qty)), array('product_id' => $cpr->id, 'store_id' => $data['store_id']));
                                 }
                             }
                         }
                    }
                }
            }

            if($did) {
                $this->db->delete('suspended_sales', array('id' => $did));
                $this->db->delete('suspended_items', array('suspend_id' => $did));
            }
            $msg = array();
            if(! empty($payment)) {
                if ($payment['paid_by'] == 'stripe') {
                    $card_info = array("number" => $payment['cc_no'], "exp_month" => $payment['cc_month'], "exp_year" => $payment['cc_year'], "cvc" => $payment['cc_cvv2'], 'type' => $payment['cc_type']);
                    $result = $this->stripe($payment['amount'], $card_info);
                    if (!isset($result['error']) && !empty($result['transaction_id'])) {
                        $payment['transaction_id'] = $result['transaction_id'];
                        $payment['date'] = $result['created_at'];
                        $payment['amount'] = $result['amount'];
                        $payment['currency'] = $result['currency'];
                        unset($payment['cc_cvv2']);
                        $payment['sale_id'] = $sale_id;
                        $this->db->insert('payments', $payment);
                    } else {
                        $this->db->update('sales', ['paid' => 0, 'status' => 'due'], ['id' => $sale_id]);
                        $msg[] = lang('payment_failed');
                        $msg[] = '<p class="text-danger">' . $result['code'] . ': ' . $result['message'] . '</p>';
                    }
                } else {
                    if ($payment['paid_by'] == 'gift_card') {
                        $gc = $this->getGiftCardByNO($payment['gc_no']);
                        $this->db->update('gift_cards', array('balance' => ($gc->balance-$payment['amount'])), array('card_no' => $payment['gc_no']));
                    }
                    unset($payment['cc_cvv2']);
                    $payment['sale_id'] = $sale_id;
                    $this->db->insert('payments', $payment);
                }
            }

            return array('sale_id' => $sale_id, 'message' => $msg);
            }

        return false;
    }

    //-- image upload function with resize option
    function upload_image($max_size){
            
            //-- set upload path
            $config['upload_path']  = "./assets/images/";
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $config['max_size']     = '92000';
            $config['max_width']    = '92000';
            $config['max_height']   = '92000';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("photo")) {

                
                $data = $this->upload->data();

                //-- set upload path
                $source             = "./assets/images/".$data['file_name'] ;
                $destination_thumb  = "./assets/images/thumbnail/" ;
                $destination_medium = "./assets/images/medium/" ;
                $main_img = $data['file_name'];
                // Permission Configuration
                chmod($source, 0777) ;

                /* Resizing Processing */
                // Configuration Of Image Manipulation :: Static
                $this->load->library('image_lib') ;
                $img['image_library'] = 'GD2';
                $img['create_thumb']  = TRUE;
                $img['maintain_ratio']= TRUE;

                /// Limit Width Resize
                $limit_medium   = $max_size ;
                $limit_thumb    = 200 ;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                    $percent_medium = $limit_medium/$limit_use ;
                    $percent_thumb  = $limit_thumb/$limit_use ;
                }

                //// Making THUMBNAIL ///////
                $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = ' 100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_thumb ;

                $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                ////// Making MEDIUM /////////////
                $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = '100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_medium ;

                $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                //-- set upload path
                $images = 'assets/images/medium/'.$mid;
                $thumb  = 'assets/images/thumbnail/'.$thumb_nail;
                unlink($source) ;

                return array(
                    'images' => $images,
                    'thumb' => $thumb
                );
            }
            else {
                echo "Failed! to upload image" ;
            }
            
    }

    //-- select by orderId to get saleId
    function get_saleId($id){
        $query=$this->db->query("select id from sale where order_id = $id ");
	    return $query->result_array();
    } 

    //-- select by saleId
    function select_by_saleId($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('sale_id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 

    //-- select by orderId
    function select_by_orderId($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('order_id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 
}
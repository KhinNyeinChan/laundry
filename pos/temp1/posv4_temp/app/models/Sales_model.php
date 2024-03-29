<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function getSaleByID($id) {
        $q = $this->db->get_where('sales', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

	public function deleteInvoice($id) {

        //mod nyi nyi 27th May 2017
          if ($sale_items = $this->getAllSaleItems($id)) {
              foreach ($sale_items as $item) {
                  $product = $this->site->getProductByID($item->product_id, $osale->store_id);
                
                //if ($this->getStoreQuantity($item->product_id, $item->store_id)) {
$this->db->update('product_store_qty', array('quantity' => $item->quantity + $product->quantity), array('product_id' => $item->product_id)); 
                 //}
              }
          }
         
         //$this->db->update('product_store_qty', array('quantity' => 5 ), array('product_id' => 33)); 
        //end mod
        
		if($this->db->delete('sale_items', array('sale_id' => $id)) &&
		$this->db->delete('sales', array('id' => $id)) && $this->db->delete('payments', array('sale_id' => $id))) {
			return true;
		}
		return FALSE;
	}

    public function deleteOpenedSale($id,$order) {
        if($this->db->delete('suspended_items', array('suspend_id' => $id)) && $this->db->delete('suspended_sales', array('id' => $id)) && $this->db->update('order_items', array('status' => 'Cancelled', 'reason' => 'Deleted the whole order'), array('order_id' => $order))) {
            return true;
        }
        return FALSE;
    }

    
    public function getOrderId($id) {
        $q = $this->db->get_where('suspended_sales', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }


    public function getSalePayments($sale_id) {
        $this->db->order_by('id', 'asc');
        $q = $this->db->get_where('payments', array('sale_id' => $sale_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getPaymentByID($id) {
        $q = $this->db->get_where('payments', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addPayment($data = array()) {
        if ($this->db->insert('payments', $data)) {
            if ($data['paid_by'] == 'gift_card') {
                $gc = $this->site->getGiftCard($data['gc_no']);
                $this->db->update('gift_cards', array('balance' => ($gc->balance - $data['amount'])), array('card_no' => $data['gc_no']));
            }
            $this->syncSalePayments($data['sale_id']);
            return true;
        }
        return false;
    }

    public function updatePayment($id, $data = array()) {
        $payment = $this->getPaymentByID($id);
        if ($payment->paid_by == 'gift_card') {
            $gc = $this->site->getGiftCard($payment->gc_no);
            $this->db->update('gift_cards', array('balance' => ($gc->balance + $payment->amount)), array('card_no' => $payment->gc_no));
        }
        if ($this->db->update('payments', $data, array('id' => $id))) {
            if ($data['paid_by'] == 'gift_card') {
                $gc = $this->site->getGiftCard($data['gc_no']);
                $this->db->update('gift_cards', array('balance' => ($gc->balance - $data['amount'])), array('card_no' => $data['gc_no']));
            }
            $this->syncSalePayments($data['sale_id']);
            return true;
        }
        return false;
    }

    public function deletePayment($id) {
        $payment = $this->getPaymentByID($id);
        if ($payment->paid_by == 'gift_card') {
            $gc = $this->site->getGiftCard($payment->gc_no);
            $this->db->update('gift_cards', array('balance' => ($gc->balance + $payment->amount)), array('card_no' => $payment->gc_no));
        }
        if ($this->db->delete('payments', array('id' => $id))) {
            $this->syncSalePayments($payment->sale_id);
            return true;
        }
        return FALSE;
    }

    public function syncSalePayments($id) {
        $sale = $this->getSaleByID($id);
        $payments = $this->getSalePayments($id);
        $paid = 0;
        if($payments) {
            foreach ($payments as $payment) {
                $paid += $payment->amount;
            }
        }
        $status = $paid <= 0 ? 'due' : ($sale->grand_total <= $paid ? 'paid' : 'partial');
        if ($this->db->update('sales', array('paid' => $paid, 'status' => $status), array('id' => $id))) {
            return true;
        }

        return FALSE;
    }

    public function updateStatus($id, $status) {
        if ($this->db->update('sales', array('status' => $status), array('id' => $id))) {
            return true;
        }
        return false;
    }

    public function getAllSaleItems($sale_id) {
        $j = "(SELECT id, code, name, tax_method from {$this->db->dbprefix('products')}) P";
        $this->db->select("sale_items.*,
            (CASE WHEN {$this->db->dbprefix('sale_items')}.product_code IS NULL THEN {$this->db->dbprefix('products')}.code ELSE {$this->db->dbprefix('sale_items')}.product_code END) as product_code,
            (CASE WHEN {$this->db->dbprefix('sale_items')}.product_name IS NULL THEN {$this->db->dbprefix('products')}.name ELSE {$this->db->dbprefix('sale_items')}.product_name END) as product_name,
            {$this->db->dbprefix('products')}.tax_method as tax_method", FALSE)
        ->join('products', 'products.id=sale_items.product_id', 'left outer')
        ->order_by('sale_items.id');
        $q = $this->db->get_where('sale_items', array('sale_id' => $sale_id));
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getAllSalePayments($sale_id) {
        $q = $this->db->get_where('payments', array('sale_id' => $sale_id));
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getCustomerByID($id) {
        $q = $this->db->get_where('customers', array('id' => $id), 1);
          if( $q->num_rows() > 0 ) {
            return $q->row();
          }
          return FALSE;
    }

}

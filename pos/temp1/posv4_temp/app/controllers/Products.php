<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller
{

    function __construct() {
        parent::__construct();


        if (!$this->loggedIn) {
            redirect('login');
        }

        $this->load->library('form_validation');
        $this->load->model('products_model');
    }

    function index() {

        $stores = $this->site->getAllStores();
        if ($this->input->get('store_id') && !$this->session->userdata('has_store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->input->get('store_id', TRUE));
        } elseif ($this->session->userdata('store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->session->userdata('store_id'));
        } else {
            $this->data['store'] = current($stores);
        }
        $this->data['stores'] = $stores;
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('products');
        $bc = array(array('link' => '#', 'page' => lang('products')));
        $meta = array('page_title' => lang('products'), 'bc' => $bc);
        $this->page_construct('products/index', $this->data, $meta);

    }
 function delete_units($id = NULL) {
        if(DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }
        if ( ! $this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->products_model->deleteUnit($id)) {
            $this->session->set_flashdata('message', lang("unit_deleted"));
            redirect('products/list_units');
        }
    }
  function delete_brands($id = NULL) {
        if(DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }
        if ( ! $this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->products_model->deleteBrand($id)) {
            $this->session->set_flashdata('message', lang("brand_deleted"));
            redirect('products/list_brands');
        }
    }

function edit_units($id = NULL) {
      
        if ( ! $this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        $this->load->helper('security');
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

     $this->form_validation->set_rules('name', lang("unit"), 'required');
       
         if ($this->form_validation->run() == true) {
            $data = array( 
                'code' =>$this->input->post('code'),
                'name' => $this->input->post('name')
            );

        }
         elseif ($this->input->post('name')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->form_validation->run() == true && $this->products_model->updateUnits($id, $data)) {
            $this->session->set_flashdata('message', lang("unit_updated"));
            redirect("products/list_units");
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['unit'] = $this->products_model->getUnitByID($id);
            //$this->data['expense_category'] = $this->products_model->getExpenseCategoryByID($id);
            $this->data['page_title'] = lang('edit_units');
            $bc = array(array('link' => site_url('products/list_units'), 'page' => lang('unit')), array('link' => site_url('products/list_units'), 'page' => lang('unit')), array('link' => '#', 'page' => lang('edit_units')));
            $meta = array('page_title' => lang('edit_units'), 'bc' => $bc);
            $this->page_construct('products/edit_units', $this->data, $meta);

        }
    }

function edit_brands($id = NULL) {
      
        if ( ! $this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        $this->load->helper('security');
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

     $this->form_validation->set_rules('brand_name', lang("brand_name"), 'required');
       
         if ($this->form_validation->run() == true) {
            $data = array( 
                'name' => $this->input->post('brand_name')
            );

        }
         elseif ($this->input->post('brand_name')) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->form_validation->run() == true && $this->products_model->updateBrands($id, $data)) {
            $this->session->set_flashdata('message', lang("brand_updated"));
            redirect("products/list_brands");
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['brand'] = $this->products_model->getBrandByID($id);
            //$this->data['expense_category'] = $this->products_model->getExpenseCategoryByID($id);
            $this->data['page_title'] = lang('edit_brands');
            $bc = array(array('link' => site_url('products/list_brands'), 'page' => lang('brand')), array('link' => site_url('products/list_brands'), 'page' => lang('brand')), array('link' => '#', 'page' => lang('edit_brands')));
            $meta = array('page_title' => lang('edit_brands'), 'bc' => $bc);
            $this->page_construct('products/edit_brands', $this->data, $meta);

        }
    }


function list_brands() {

        $stores = $this->site->getAllStores();
        if ($this->input->get('store_id') && !$this->session->userdata('has_store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->input->get('store_id', TRUE));
        } elseif ($this->session->userdata('store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->session->userdata('store_id'));
        } else {
            $this->data['store'] = current($stores);
        }
        $this->data['stores'] = $stores;
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('products');
        $bc = array(array('link' => '#', 'page' => lang('products')));
        $meta = array('page_title' => lang('list_brands'), 'bc' => $bc);
        $this->page_construct('products/list_brands', $this->data, $meta);

    }
function list_units() {

        $stores = $this->site->getAllStores();
        if ($this->input->get('store_id') && !$this->session->userdata('has_store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->input->get('store_id', TRUE));
        } elseif ($this->session->userdata('store_id')) {
            $this->data['store'] = $this->site->getStoreByID($this->session->userdata('store_id'));
        } else {
            $this->data['store'] = current($stores);
        }
        $this->data['stores'] = $stores;
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $this->data['page_title'] = lang('products');
        $bc = array(array('link' => '#', 'page' => lang('products')));
        $meta = array('page_title' => lang('list_units'), 'bc' => $bc);
        $this->page_construct('products/list_units', $this->data, $meta);

    }
function get_units() {

        $this->load->library('datatables');
        $this->datatables->select("id,code, name");
        $this->datatables->from('unit');
       $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a href='" . site_url('products/edit_units/$1') . "' title='" . lang("edit_units") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('products/delete_units/$1') . "' onClick=\"return confirm('" . lang('alert_x_units') . "')\" title='" . lang("delete_units") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();

    } 

  function get_brands() {

        $this->load->library('datatables');
        $this->datatables->select("id, name");
        $this->datatables->from('brands');
       $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a href='" . site_url('products/edit_brands/$1') . "' title='" . lang("edit_brands") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('products/delete_brands/$1') . "' onClick=\"return confirm('" . lang('alert_x_brands') . "')\" title='" . lang("delete_brands") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();

    } // end mod by amw and mtk

    function get_products($store_id) {

        $this->load->library('datatables');

	//mod by Nyi Nyi on 4th Apr 2018
	/*
	 if (($this->Admin) ||($this->Manager)){
            $this->datatables->select($this->db->dbprefix('products').".id as pid, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type, ".$this->db->dbprefix('categories').".name as cname, psq.quantity, tax, tax_method, cost, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price, barcode_symbology", FALSE);
        } else {
            $this->datatables->select($this->db->dbprefix('products').".id as pid, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type, ".$this->db->dbprefix('categories').".name as cname, psq.quantity, tax, tax_method, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price, barcode_symbology", FALSE);
        }
	*/
        if (($this->Admin) ||($this->Manager)){
            $this->datatables->select($this->db->dbprefix('products').".id as pid, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type,".$this->db->dbprefix('brands').".name as bname, ".$this->db->dbprefix('unit').".name as uname,
                ".$this->db->dbprefix('categories').".name as cname, COALESCE(psq.quantity,0) as quantity, tax, tax_method, cost, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price, ROUND(COALESCE(psq.quantity * cost,0),2) as stockQtyAmt, ".$this->db->dbprefix('products').".details as WholeSalePrice,barcode_symbology", FALSE);
        } else {
            $this->datatables->select($this->db->dbprefix('products').".id as pid, ".$this->db->dbprefix('products').".image as image, ".$this->db->dbprefix('products').".code as code, ".$this->db->dbprefix('products').".name as pname, type,".$this->db->dbprefix('brands').".name as bname,".$this->db->dbprefix('unit').".name as uname,
             ".$this->db->dbprefix('categories').".name as cname, COALESCE(psq.quantity,0) as quantity, tax, tax_method, (CASE WHEN psq.price > 0 THEN psq.price ELSE {$this->db->dbprefix('products')}.price END) as price,  ROUND(COALESCE(psq.quantity * cost,0),2) as stockQtyAmt, ".$this->db->dbprefix('products').".details as WholeSalePrice,barcode_symbology", FALSE);
        }
	//end mod ROUND(COALESCE(psq.quantity * cost,0),2) as stockQtyAmt,
	
        $this->datatables->from('products')
        ->join('categories', 'categories.id=products.category_id', 'left')
        // ->join('product_store_qty', 'product_store_qty.product_id=products.id', 'left')
        ->join("( SELECT * from {$this->db->dbprefix('product_store_qty')} WHERE store_id = {$store_id}) psq", 'products.id=psq.product_id', 'left')
        // ->where('product_store_qty.store_id', $store_id)
         ->join('brands','products.brand_id=brands.id', 'left')
         ->join('unit','products.unit_id=unit.id','left')
        ->group_by('products.id');

        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a href='".site_url('products/view/$1')."' title='" . lang("view") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-file-text-o'></i></a><a href='".site_url('products/single_barcode/$1')."' title='".lang('print_barcodes')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a href='".site_url('products/single_label/$1')."' title='".lang('print_labels')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a id='$4 ($3)' href='" . site_url('products/gen_barcode/$3/$5') . "' title='" . lang("view_barcode") . "' class='barcode tip btn btn-primary btn-xs'><i class='fa fa-barcode'></i></a> <a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('products/edit/$1') . "' title='" . lang("edit_product") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('products/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_product') . "')\" title='" . lang("delete_product") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "pid, image, code, pname, barcode_symbology");

        $this->datatables->unset_column('pid')->unset_column('barcode_symbology');
        echo $this->datatables->generate();

    }

   /* function get_brands() {

        $this->load->library('datatables');
        $this->datatables->select("id, name");
        $this->datatables->from('brands');
        

        //$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a href='".site_url('products/view/$1')."' title='" . lang("view") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-file-text-o'></i></a><a href='".site_url('products/single_barcode/$1')."' title='".lang('print_barcodes')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a href='".site_url('products/single_label/$1')."' title='".lang('print_labels')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a id='$4 ($3)' href='" . site_url('products/gen_barcode/$3/$5') . "' title='" . lang("view_barcode") . "' class='barcode tip btn btn-primary btn-xs'><i class='fa fa-barcode'></i></a> <a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('products/edit/$1') . "' title='" . lang("edit_product") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('products/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_product') . "')\" title='" . lang("delete_product") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "pid, image, code, pname, barcode_symbology");
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('categories/edit/$1') . "' title='" . lang("edit_category") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('categories/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_category') . "')\" title='" . lang("delete_category") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id, image, name");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();


    } */
    // end mod by amw and mtk

    function view($id = NULL) {
        $data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        $product = $this->site->getProductByID($id);
        $this->data['product'] = $product;
        $this->data['category'] = $this->site->getCategoryByID($product->category_id);
        $this->data['combo_items'] = $product->type == 'combo' ? $this->products_model->getComboItemsByPID($id) : NULL;
        $this->load->view($this->theme.'products/view', $this->data);

    }

    function barcode($product_code = NULL) {
        if ($this->input->get('code')) {
            $product_code = $this->input->get('code');
        }
        $data['product_details'] = $this->products_model->getProductByCode($product_code);
        $data['img'] = "<img src='" . base_url() . "index.php?products/gen_barcode&code={$product_code}' alt='{$product_code}' />";
        $this->load->view('barcode', $data);

    }

    function product_barcode($product_code = NULL, $bcs = 'code128', $height = 60) {
        if ($this->input->get('code')) {
            $product_code = $this->input->get('code');
        }
        return "<img src='" . base_url() . "products/gen_barcode/{$product_code}/{$bcs}/{$height}' alt='{$product_code}' />";
    }

    function gen_barcode($product_code = NULL, $bcs = 'code128', $height = 60, $text = 1) {
        $drawText = ($text != 1) ? FALSE : TRUE;
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $barcodeOptions = array('text' => $product_code, 'barHeight' => $height, 'drawText' => $drawText);
        $rendererOptions = array('imageType' => 'png', 'horizontalPosition' => 'center', 'verticalPosition' => 'middle');
        $imageResource = Zend_Barcode::render($bcs, 'image', $barcodeOptions, $rendererOptions);
        return $imageResource;
    }

    function print_barcodes() {
        $this->load->library('pagination');
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        $config['base_url'] = site_url('products/print_barcodes');
        $config['total_rows'] = $this->products_model->products_count();
        $config['per_page'] = 12;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);

  // #Mod  mod1 Label and bar code script fix by Zay Yar at 7/1/2017

        if($this->uri->segment(3)){
        $item_id = ($this->uri->segment(3)) ;
        }
        else{
      $item_id = 0;
}

        $products = $this->products_model->fetch_products($config['per_page'], $item_id);
        $r = 1;
        $html = "";
        $html .= '<table class="table table-bordered">
        <tbody><tr>';
        foreach ($products as $pr) {
            if ($r != 1) {
                $rw = (bool)($r & 1);
                $html .= $rw ? '</tr><tr>' : '';
            }
            $html .= '<td><h4>' . $this->Settings->site_name . '</h4><strong>' . $pr->name . '</strong><br>' . $this->product_barcode($pr->code, $pr->barcode_symbology, 60) . '<br><span class="price">'.$this->Settings->currency_prefix. ' ' . $pr->price . '</span></td>';
            $r++;
        }
        $html .= '</tr></tbody>
        </table>';

        $this->data['html'] = $html;
        $this->data['page_title'] = lang("print_barcodes");
        $this->load->view($this->theme.'products/print_barcodes', $this->data);
    }

    function print_labels() {
        $this->load->library('pagination');
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : 0;
        $config['base_url'] = site_url('products/print_labels');
        $config['total_rows'] = $this->products_model->products_count();
        $config['per_page'] = 10;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);

        if($this->uri->segment(3)){
        $item_id = ($this->uri->segment(3)) ;
        }
        else{
      $item_id = 0;
}

        $products = $this->products_model->fetch_products($config['per_page'], $item_id);
        $r = 1;
        $html = "";
        foreach ($products as $pr) {
            $html .= '<div class="text-center labels"><strong>' . $pr->name . '</strong><br>' . $this->product_barcode($pr->code, $pr->barcode_symbology, 25) . '<br><span class="price">'.lang('price') .': ' .$this->Settings->currency_prefix. ' ' . $pr->price . '</span></div>';
        }

        $this->data['html'] = $html;
        $this->data['page_title'] = lang("print_labels");
        $this->load->view($this->theme.'products/print_labels', $this->data);
    }

    function single_barcode($product_id = NULL) {

        $product = $this->site->getProductByID($product_id);

        $html = "";
        $html .= '<table class="table table-bordered table-centered mb0">
        <tbody><tr>';
        if($product->quantity > 0) {
            for ($r = 1; $r <= $product->quantity; $r++) {
                if ($r != 1) {
                    $rw = (bool)($r & 1);
                    $html .= $rw ? '</tr><tr>' : '';
                }
                $html .= '<td><h4>' . $this->Settings->site_name . '</h4><strong>' . $product->name . '</strong><br>' . $this->product_barcode($product->code, $product->barcode_symbology, 60) . ' <br><span class="price">'.lang('price') .': ' .$this->Settings->currency_prefix. ' ' . $product->price . '</span></td>';
            }
        } else {
            for ($r = 1; $r <= 10; $r++) {
            if ($r != 1) {
                $rw = (bool)($r & 1);
                $html .= $rw ? '</tr><tr>' : '';
            }
            $html .= '<td><h4>' . $this->Settings->site_name . '</h4><strong>' . $product->name . '</strong><br>' . $this->product_barcode($product->code, $product->barcode_symbology, 60) . ' <br><span class="price">'.lang('price') .': ' .$this->Settings->currency_prefix. ' ' . $product->price . '</span></td>';
        }
        }
        $html .= '</tr></tbody>
        </table>';

        $this->data['html'] = $html;
        $this->data['page_title'] = lang("print_barcodes").' ('.$product->name.')';
        $this->load->view($this->theme . 'products/single_barcode', $this->data);
    }

    function single_label($product_id = NULL, $warehouse_id = NULL) {

        $product = $this->site->getProductByID($product_id);
        $html = "";
        if($product->quantity > 0) {
            for ($r = 1; $r <= $product->quantity; $r++) {
                $html .= '<div class="text-center labels"><strong>' . $product->name . '</strong><br>' . $this->product_barcode($product->code, $product->barcode_symbology, 25) . ' <br><span class="price">'.lang('price') .': ' .$this->Settings->currency_prefix. ' ' . $product->price . '</span></div>';
            }
        } else {
            for ($r = 1; $r <= 10; $r++) {
                $html .= '<div class="text-center labels"><strong>' . $product->name . '</strong><br>' . $this->product_barcode($product->code, $product->barcode_symbology, 25) . ' <br><span class="price">'.lang('price') .': ' .$this->Settings->currency_prefix. ' ' . $product->price . '</span></div>';
            }
        }
        $this->data['html'] = $html;
        $this->data['page_title'] = lang("print_labels").' ('.$product->name.')';
        $this->load->view($this->theme . 'products/single_label', $this->data);

    }
function brands_add(){
    if (($this->Admin) || ($this->Manager)) {
    }else {
    
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
$this->form_validation->set_rules('brand_name', lang("brand_name"), 'required');
 if ($this->form_validation->run() == true) {
     $data = array(
                'name' => $this->input->post('brand_name'));
}
 if ($this->form_validation->run() == true && $this->products_model->addBrand($data)) {
            $this->session->set_flashdata('message', lang("brand_added"));
            redirect('products/list_brands');

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['page_title'] = lang('add_brand');
            $bc = array(array('link' => site_url('products/list_brands'), 'page' => lang('products')), array('link' => '#', 'page' => lang('add_brand')));
            $meta = array('page_title' => lang('add_brand'), 'bc' => $bc);
            $this->page_construct('products/brands_add', $this->data, $meta);

        }
  } 
  //mod by amw 28/2/1019 
  
function unit_add(){
    if (($this->Admin) || ($this->Manager)) {
    }else {
    
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        $this->form_validation->set_rules('code', lang("code"), 'required');
 $this->form_validation->set_rules('unit', lang("unit"), 'required');
 if ($this->form_validation->run() == true) {
     $data = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('unit'));
}
 if ($this->form_validation->run() == true && $this->products_model->addUnit($data)) {
            $this->session->set_flashdata('message', lang("unit_added"));
         redirect('products/list_units');

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['page_title'] = lang('add_unit');
            $bc = array(array('link' => site_url('products/list_units'), 'page' => lang('products')), array('link' => '#', 'page' => lang('add_unit')));
            $meta = array('page_title' => lang('add_unit'), 'bc' => $bc);
            $this->page_construct('products/unit_add', $this->data, $meta);

        }
  } 
  //mod by amw 28/2/1019 
  

    function add() {
                //mod for manager role by Nyi Nyi on 3rd Aug 2017
        //if (!$this->Admin) {
        
        $this->data['units']=$this->products_model->getAllunits();
        $this->data['brands']=$this->products_model->getAllbrands();
      // $this->data['suppliers']=$this->products_model->getAllSuppliers();
    if (($this->Admin) || ($this->Manager)) {
    }else {
    //end mod 
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }

        //$this->form_validation->set_rules('code', lang("product_code"), 'trim|is_unique[products.code]|min_length[2]|max_length[50]|required|alpha_numeric');
	// mod nyi nyi 13th June 2017 
	$this->form_validation->set_rules('code', lang("product_code"), 'trim|is_unique[products.code]|min_length[2]|max_length[50]|required|alpha_numeric_dash_spaces');
	//end mod 
	
        $this->form_validation->set_rules('name', lang("product_name"), 'required');
        $this->form_validation->set_rules('category', lang("category"), 'required');
        /*$this->form_validation->set_rules('unit', lang("unit"), 'required');*/
        $this->form_validation->set_rules('price', lang("product_price"), 'required|is_numeric');
        if ($this->input->post('type') != 'service') {
            $this->form_validation->set_rules('cost', lang("product_cost"), 'required|is_numeric');
        }
        $this->form_validation->set_rules('product_tax', lang("product_tax"), 'required|is_numeric');
        $this->form_validation->set_rules('alert_quantity', lang("alert_quantity"), 'is_numeric');

        if ($this->form_validation->run() == true) {
if(!config_item('is_restaurant')){
            $data = array(
                'type' => $this->input->post('type'),
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
		          //mod nyi nyi 13th June 2017 
		        'barcode_symbology' => $this->input->post('barcode_symbology'),
		          //end mod 
                'category_id' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'tax' => $this->input->post('product_tax'),
                'tax_method' => $this->input->post('tax_method'),
                'alert_quantity' => $this->input->post('alert_quantity'),
                'brand_id'  => $this->input->post('brand'),
                'details' => $this->input->post('details'),
                'unit_id' => $this->input->post('unit'),
                );
}
else{
    $data = array(
                'type' => $this->input->post('type'),
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                //mod nyi nyi 13th June 2017 
                'barcode_symbology' => $this->input->post('barcode_symbology'),
                //end mod 
                'category_id' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'tax' => $this->input->post('product_tax'),
                'tax_method' => $this->input->post('tax_method'),
                'alert_quantity' => $this->input->post('alert_quantity'),
                'brand_id'  => 0,
                'details' => 0,
                'unit_id' => $this->input->post('unit'),
                );
}
            if ($this->Settings->multi_store) {
                $stores = $this->site->getAllStores();
                foreach ($stores as $store) {
                    $store_quantities[] = array(
                        'store_id' => $store->id,
                        'quantity' => $this->input->post('quantity'.$store->id),
                        'price' => $this->input->post('price'.$store->id)
                        );
                }
            } else {
                $store_quantities[] = array(
                    'store_id' => 1,
                    'quantity' => $this->input->post('quantity'),
                    'price' => $this->input->post('price'),
                    );
            }

            if ($this->input->post('type') == 'combo') {
                $c = sizeof($_POST['combo_item_code']) - 1;
                for ($r = 0; $r <= $c; $r++) {
                    if (isset($_POST['combo_item_code'][$r]) && isset($_POST['combo_item_quantity'][$r])) {
                        $items[] = array(
                            'item_code' => $_POST['combo_item_code'][$r],
                            'quantity' => $_POST['combo_item_quantity'][$r]
                        );
                    }
                }
            } else {
                $items = array();
            }

            if ($_FILES['userfile']['size'] > 0) {

                $this->load->library('upload');

                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width'] = '800';
                $config['max_height'] = '800';
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("products/add");
                }

                $photo = $this->upload->file_name;
                $data['image'] = $photo;

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/' . $photo;
                $config['new_image'] = 'uploads/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 110;
                $config['height'] = 110;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    redirect("products/add");
                }

            }
            // $this->tec->print_arrays($data, $items);
        }

        if ($this->form_validation->run() == true && $this->products_model->addProduct($data, $store_quantities, $items)) {

            $this->session->set_flashdata('message', lang("product_added"));
            redirect('products');

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['stores'] = $this->site->getAllStores();
            $this->data['categories'] = $this->site->getAllCategories();
            $this->data['page_title'] = lang('add_product');
            $bc = array(array('link' => site_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => lang('add_product')));
            $meta = array('page_title' => lang('add_product'), 'bc' => $bc);
            $this->page_construct('products/add', $this->data, $meta);

        }
    }

    function edit($id = NULL) {
                //mod for manager role by Nyi Nyi on 3rd Aug 2017
        $this->data['units']=$this->products_model->getAllunits();
        $this->data['brands']=$this->products_model->getAllbrands();
      if ($this->Admin) {
      }
//if (($this->Admin) || ($this->Manager)) {
 else if (($this->Manager) && (config_item('manager_edit_product'))){

   }else {
	//end mod 
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $pr_details = $this->site->getProductByID($id);
        if ($this->input->post('code') != $pr_details->code) {
            $this->form_validation->set_rules('code', lang("product_code"), 'is_unique[products.code]');
        }
        //$this->form_validation->set_rules('code', lang("product_code"), 'trim|min_length[2]|max_length[50]|required|alpha_numeric');
	// mod nyi nyi 13th June 2017 
	$this->form_validation->set_rules('code', lang("product_code"), 'trim|min_length[2]|max_length[50]|required|alpha_numeric_dash_spaces');
	//end mod 
	
        $this->form_validation->set_rules('name', lang("product_name"), 'required');
        $this->form_validation->set_rules('category', lang("category"), 'required');
        /*$this->form_validation->set_rules('unit_id', lang("unit"), 'required');*/
        $this->form_validation->set_rules('price', lang("product_price"), 'required|is_numeric');
        $this->form_validation->set_rules('cost', lang("product_cost"), 'required|is_numeric');
        $this->form_validation->set_rules('product_tax', lang("product_tax"), 'required|is_numeric');
        $this->form_validation->set_rules('alert_quantity', lang("alert_quantity"), 'is_numeric');

        if ($this->form_validation->run() == true) {
 if(!config_item('is_restaurant')){

            $data = array(
                'type' => $this->input->post('type'),
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                //mod nyi nyi 13th June 2017 
                'barcode_symbology' => $this->input->post('barcode_symbology'),
                'unit_id'      => $this->input->post('unit_id'),
                //end mod 
                'brand_id'   =>$this->input->post('brand_id'),//mod by amw
                'category_id' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'tax' => $this->input->post('product_tax'),
                'tax_method' => $this->input->post('tax_method'),
                'alert_quantity' => $this->input->post('alert_quantity'),
                'details' => $this->input->post('details'),
                );
}
else{
            $data = array(
                'type' => $this->input->post('type'),
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                //mod nyi nyi 13th June 2017 
                'barcode_symbology' => $this->input->post('barcode_symbology'),
                //end mod  
                'unit_id'      => $this->input->post('unit_id'),
             
                'brand_id'   => 0,//mod by amw
                'category_id' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'cost' => $this->input->post('cost'),
                'tax' => $this->input->post('product_tax'),
                'tax_method' => $this->input->post('tax_method'),
                'alert_quantity' => $this->input->post('alert_quantity'),
                'details' => 0,
                );

}
            if ($this->Settings->multi_store) {
                $stores = $this->site->getAllStores();
                foreach ($stores as $store) {
                    $store_quantities[] = array(
                        'store_id' => $store->id,
                        'quantity' => $this->input->post('quantity'.$store->id),
                        'price' => $this->input->post('price'.$store->id)
                        );
                }
            } else {
                $store_quantities[] = array(
                    'store_id' => 1,
                    'quantity' => $this->input->post('quantity'),
                    'price' => $this->input->post('price')
                    );
            }

            if ($this->input->post('type') == 'combo') {
                $c = sizeof($_POST['combo_item_code']) - 1;
                for ($r = 0; $r <= $c; $r++) {
                    if (isset($_POST['combo_item_code'][$r]) && isset($_POST['combo_item_quantity'][$r])) {
                        $items[] = array(
                            'item_code' => $_POST['combo_item_code'][$r],
                            'quantity' => $_POST['combo_item_quantity'][$r]
                        );
                    }
                }
            } else {
                $items = array();
            }

            if ($_FILES['userfile']['size'] > 0) {

                $this->load->library('upload');

                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width'] = '800';
                $config['max_height'] = '800';
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("products/edit/" . $id);
                }

                $photo = $this->upload->file_name;

                $this->load->helper('file');
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/' . $photo;
                $config['new_image'] = 'uploads/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 110;
                $config['height'] = 110;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    redirect("products/edit/" . $id);
                }

            } else {
                $photo = NULL;
            }

        }

        if ($this->form_validation->run() == true && $this->products_model->updateProduct($id, $data, $store_quantities, $items, $photo)) {

            $this->session->set_flashdata('message', lang("product_updated"));
            redirect("products");

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $product = $this->site->getProductByID($id);
            if($product->type == 'combo') {
                $combo_items = $this->products_model->getComboItemsByPID($id);
                foreach ($combo_items as $combo_item) {
                    $cpr = $this->site->getProductByID($combo_item->id);
                    $cpr->qty = $combo_item->qty;
                    $items[] = array('id' => $cpr->id, 'row' => $cpr);
                }
                $this->data['items'] = $items;
            }
            $this->data['product'] = $product;
            $this->data['stores'] = $this->site->getAllStores();
            $this->data['stores_quantities'] = $this->Settings->multi_store ? $this->products_model->getStoresQuantity($id) : $this->products_model->getStoreQuantity($id);
            $this->data['categories'] = $this->site->getAllCategories();
            $this->data['page_title'] = lang('edit_product');
            $bc = array(array('link' => site_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => lang('edit_product')));
            $meta = array('page_title' => lang('edit_product'), 'bc' => $bc);
            $this->page_construct('products/edit', $this->data, $meta);

        }
    }

    function import() {
        if (!$this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');

        if ($this->form_validation->run() == true) {
            if (DEMO) {
                $this->session->set_flashdata('warning', lang("disabled_in_demo"));
                redirect('pos');
            }

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');

                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '500';
                $config['overwrite'] = TRUE;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect("products/import");
                }


                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen("uploads/" . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                array_shift($arrResult);

                $keys = array('code', 'name', 'cost', 'tax', 'price', 'category');

                $final = array();
                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }

                if (sizeof($final) > 1001) {
                    $this->session->set_flashdata('error', lang("more_than_allowed"));
                    redirect("products/import");
                }

                foreach ($final as $csv_pr) {
                    if ($this->products_model->getProductByCode($csv_pr['code'])) {
                        $this->session->set_flashdata('error', lang("check_product_code") . " (" . $csv_pr['code'] . "). " . lang("code_already_exist"));
                        redirect("products/import");
                    }
                    if (!is_numeric($csv_pr['tax'])) {
                        $this->session->set_flashdata('error', lang("check_product_tax") . " (" . $csv_pr['tax'] . "). " . lang("tax_not_numeric"));
                        redirect("products/import");
                    }
                    if(! ($category = $this->site->getCategoryByCode($csv_pr['category']))) {
                        $this->session->set_flashdata('error', lang("check_category") . " (" . $csv_pr['category'] . "). " . lang("category_x_exist"));
                        redirect("products/import");
                    }
                    $data[] = array(
                        'type' => 'standard',
                        'code' => $csv_pr['code'],
                        'name' => $csv_pr['name'],
                        'cost' => $csv_pr['cost'],
                        'tax' => $csv_pr['tax'],
                        'price' => $csv_pr['price'],
                        'category_id' => $category->id
                    );
                }
                //print_r($data); die();
            }

        }

        if ($this->form_validation->run() == true && $this->products_model->add_products($data)) {

            $this->session->set_flashdata('message', lang("products_added"));
            redirect('products');

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['categories'] = $this->site->getAllCategories();
            $this->data['page_title'] = lang('import_products');
            $bc = array(array('link' => site_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => lang('import_products')));
            $meta = array('page_title' => lang('import_products'), 'bc' => $bc);
            $this->page_construct('products/import', $this->data, $meta);

        }
    }


    function delete($id = NULL) {
        if(DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if (!$this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }

        if ($this->products_model->deleteProduct($id)) {
            $this->session->set_flashdata('message', lang("product_deleted"));
            redirect('products');
        }

    }

    function suggestions() {
         $term = $this->input->get('term', TRUE);

         $rows = $this->products_model->getProductNames($term);
         if ($rows) {
             foreach ($rows as $row) {
                 $row->qty = 1;
                 $pr[] = array('id' => str_replace(".", "", microtime(true)), 'item_id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'row' => $row);
             }
             echo json_encode($pr);
         } else {
             echo json_encode(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
         }
     }
	 
	 //mod by Nyi Nyi on 18th Jan 2018 for JSON
	function getproductsJSON(){
           echo json_encode($this->products_model->getAllProducts());
         } 
	//end mod 

}

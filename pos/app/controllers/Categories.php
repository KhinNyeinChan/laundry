<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Controller
{

    function __construct() {
        parent::__construct();


        if (!$this->loggedIn) {
            redirect('login');
        }

        $this->load->library('form_validation');
        $this->load->model('categories_model');
    }

    function index() {

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['categories'] = $this->site->getAllCategories();
        $this->data['page_title'] = lang('categories');
        $bc = array(array('link' => '#', 'page' => lang('categories')));
        $meta = array('page_title' => lang('categories'), 'bc' => $bc);
        $this->page_construct('categories/index', $this->data, $meta);

    }

    /*function get_categoriess() {

        $this->load->library('datatables');
        $this->datatables->select("id, image, code, name, printer_id");
        $this->datatables->from('categories');
        //$this->datatables->join('printers', 'printers.id'='categories.printer_id', left);
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('categories/edit/$1') . "' title='" . lang("edit_category") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('categories/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_category') . "')\" title='" . lang("delete_category") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id, image, code, name");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();

    }*/

    //mod by amw and mtk at 20 Feb 2019 for multiple order printer
    function get_categories() {

        $this->load->library('datatables');
        $this->datatables->select($this->db->dbprefix('categories').".id as id, image, code, name, ".$this->db->dbprefix('printers').".title as title", FALSE);
        $this->datatables->from('categories')
        ->join('printers', 'printers.id=categories.printer_id', 'left')
        //->join("( SELECT * from {$this->db->dbprefix('product_store_qty')} WHERE store_id = {$store_id}) psq", 'products.id=psq.product_id', 'left')
        ->group_by('categories.id');

        //$this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a href='".site_url('products/view/$1')."' title='" . lang("view") . "' class='tip btn btn-primary btn-xs' data-toggle='ajax'><i class='fa fa-file-text-o'></i></a><a href='".site_url('products/single_barcode/$1')."' title='".lang('print_barcodes')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a href='".site_url('products/single_label/$1')."' title='".lang('print_labels')."' class='tip btn btn-default btn-xs' data-toggle='ajax-modal'><i class='fa fa-print'></i></a> <a id='$4 ($3)' href='" . site_url('products/gen_barcode/$3/$5') . "' title='" . lang("view_barcode") . "' class='barcode tip btn btn-primary btn-xs'><i class='fa fa-barcode'></i></a> <a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('products/edit/$1') . "' title='" . lang("edit_product") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('products/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_product') . "')\" title='" . lang("delete_product") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "pid, image, code, pname, barcode_symbology");
        $this->datatables->add_column("Actions", "<div class='text-center'><div class='btn-group'><a class='tip image btn btn-primary btn-xs' id='$4 ($3)' href='" . base_url('uploads/$2') . "' title='" . lang("view_image") . "'><i class='fa fa-picture-o'></i></a> <a href='" . site_url('categories/edit/$1') . "' title='" . lang("edit_category") . "' class='tip btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> <a href='" . site_url('categories/delete/$1') . "' onClick=\"return confirm('" . lang('alert_x_category') . "')\" title='" . lang("delete_category") . "' class='tip btn btn-danger btn-xs'><i class='fa fa-trash-o'></i></a></div></div>", "id, image, code, name");
        $this->datatables->unset_column('cid');
        echo $this->datatables->generate();


    } // end mod by amw and mtk

    function add() {
         //mod for manager role by Nyi Nyi on 3rd Aug 2017
        //if (!$this->Admin) {
	if (($this->Admin) || ($this->Manager)) {
	}else {
	//end mod 
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }

        $this->form_validation->set_rules('name', lang('category_name'), 'required');
        $this->form_validation->set_rules('code', lang("category_code"), 'trim|is_unique[categories.code]|min_length[2]|max_length[50]|required|alpha_numeric_dash_spaces');

        if ($this->form_validation->run() == true) {
            if(config_item('is_restaurant') && config_item('multiple_order_printer')){
            $data = array('code' => $this->input->post('code'), 'name' => $this->input->post('name'), 'printer_id' => $this->input->post('printer_id'));//mod by amw and mtk to add printer_id in array at 20 Feb 2019 for multiple order printer
            }
            else
            {
            $data = array('code' => $this->input->post('code'), 'name' => $this->input->post('name'));
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
                    $this->upload->set_flashdata('error', $error);
                    redirect("categories/add");
                }

                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                //$title = $this->input->post('title');
                //$data['printer_id'] = $title;

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/' . $photo;
                $config['new_image'] = 'uploads/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 50;
                $config['height'] = 50;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    $this->upload->set_flashdata('error', $this->image_lib->display_errors());
                    redirect("categories/add");
                }

            }
        }

        if ($this->form_validation->run() == true && $this->categories_model->addCategory($data)) {

            $this->session->set_flashdata('message', lang('category_added'));
            redirect("categories");

        } else {
            
            $this->data['printers'] = $this->site->getAllPrinters();//mod by amw and mtk at 20 Feb 2019 for multiple order printer
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['page_title'] = lang('add_category');
            $bc = array(array('link' => site_url('categories'), 'page' => lang('categories')), array('link' => '#', 'page' => lang('add_category')));
            $meta = array('page_title' => lang('add_category'), 'bc' => $bc);
            $this->page_construct('categories/add', $this->data, $meta);
        }
    }

    function edit($id = NULL) {
          //mod for manager role by Nyi Nyi on 3rd Aug 2017
        //if (!$this->Admin) {
	if (($this->Admin) || ($this->Manager)) {
	}else {
	//end mod 
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }


        $this->form_validation->set_rules('name', lang('category_name'), 'required');

        if ($this->form_validation->run() == true) {
            $data = array('code' => $this->input->post('code'), 'name' => $this->input->post('name'), 'printer_id' => $this->input->post('printer_id'));//mod by amw and mtk to add printer_id in array at 20 Feb 2019 for multiple order printer

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
                    $this->upload->set_flashdata('error', $error);
                    redirect("categories/add");
                }

                $photo = $this->upload->file_name;
                $data['image'] = $photo;

                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'uploads/' . $photo;
                $config['new_image'] = 'uploads/thumbs/' . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 50;
                $config['height'] = 50;

                $this->image_lib->clear();
                $this->image_lib->initialize($config);

                if (!$this->image_lib->resize()) {
                    $this->upload->set_flashdata('error', $this->image_lib->display_errors());
                    redirect("categories/edit");
                }

            }

        }

        if ($this->form_validation->run() == true && $this->categories_model->updateCategory($id, $data)) {

            $this->session->set_flashdata('message', lang('category_updated'));
            redirect("categories");

        } else {

            $this->data['printers'] = $this->site->getAllPrinters();//mod by amw and mtk at 20 Feb 2019 for multiple order printer

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['category'] = $this->site->getCategoryByID($id);
            $this->data['page_title'] = lang('new_category');
            $bc = array(array('link' => site_url('categories'), 'page' => lang('categories')), array('link' => '#', 'page' => lang('edit_category')));
            $meta = array('page_title' => lang('edit_category'), 'bc' => $bc);
            $this->page_construct('categories/edit', $this->data, $meta);

        }
    }

    function delete($id = NULL) {
        if(DEMO) {
            $this->session->set_flashdata('error', lang('disabled_in_demo'));
            redirect(isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : 'welcome');
        }
        if (!$this->Admin) {
            $this->session->set_flashdata('error', lang('access_denied'));
            redirect('pos');
        }
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->categories_model->deleteCategory($id)) {
            $this->session->set_flashdata('message', lang("category_deleted"));
            redirect('categories');
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
                    redirect("categories/import");
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

                $keys = array('code', 'name');

                $final = array();
                foreach ($arrResult as $key => $value) {
                    $final[] = array_combine($keys, $value);
                }

                if (sizeof($final) > 1001) {
                    $this->session->set_flashdata('error', lang("more_than_allowed"));
                    redirect("categories/import");
                }

                foreach ($final as $csv_pr) {
                    if($this->site->getCategoryByCode($csv_pr['code'])) {
                        $this->session->set_flashdata('error', lang("check_category") . " (" . $csv_pr['code'] . "). " . lang("category_already_exist"));
                        redirect("categories/import");
                    }
                    $data[] = array('code' => $csv_pr['code'], 'name' => $csv_pr['name']);
                }
            }

        }

        if ($this->form_validation->run() == true && $this->categories_model->add_categories($data)) {

            $this->session->set_flashdata('message', lang("categories_added"));
            redirect('categories');

        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['page_title'] = lang('import_categories');
            $bc = array(array('link' => site_url('products'), 'page' => lang('products')), array('link' => site_url('categories'), 'page' => lang('categories')), array('link' => '#', 'page' => lang('import_categories')));
            $meta = array('page_title' => lang('import_categories'), 'bc' => $bc);
            $this->page_construct('categories/import', $this->data, $meta);

        }
    }
	
	//mod by Nyi Nyi on 18th Jan 2018 for JSON
	function getcategoriesJSON(){
           echo json_encode($this->categories_model->getAllCategories());
         } 
	//end mod 
}

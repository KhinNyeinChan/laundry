<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

	//mod by Nyi Nyi on 18th Jan 2018 for JSON
	public function getAllCategories() {
        $q = $this->db->get('categories');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
	//end mod 
	
    public function addCategory($data) {
        if ($this->db->insert('categories', $data)) {
            return true;
        }
        return false;
    }

    public function add_categories($data = array()) {
        if ($this->db->insert_batch('categories', $data)) {
            return true;
        }
        return false;
    }

    public function updateCategory($id, $data = NULL) {
        if ($this->db->update('categories', $data, array('id' => $id))) {
            return true;
        }
        return false;
    }

    public function deleteCategory($id) {
        if ($this->db->delete('categories', array('id' => $id))) {
            return true;
        }
        return FALSE;
    }

}

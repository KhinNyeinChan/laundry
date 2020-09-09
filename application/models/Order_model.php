<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

   /*function saverecords($data)

     {
         $query="insert into orders values('$start_date','$end_date','$total_qty','$total_item','$status','$created_by','$customer_name','$assign_to')";
          $this->db->query($query);

          $order_id = $this->db->insert_id();

         $query="insert into order_items values('$status','$created_by','$customer_name','$quantity','$product_id','$product_code','$product_name','$assign_to')";
        $this->db->query($query);
      }*/

    /*function saveassign($start_date,$end_date,$product_code,$customer_name,$created_by,$total_qty,$total_item,$product_name,$status,$quantity,$modified_time,$modified_by,$assign_to)

    {
        $query="insert into orders values('','$start_date','$end_date','$total_qty','$total_item','$status','$created_by','$customer_name','$assign_to')";
        $this->db->query($query);

        $o_id = $this->db->insert_id();
        $query="insert into orders_item values('','$start_date','$end_date','$total_qty','$total_item','$status','$created_by','$customer_name','$quantity','$product_code','$product_name','$modified_time','$modified_by','$assign_to')";
        $this->db->query($query);
    }*/

    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);        
        return $this->db->insert_id();
    }


public function saverecords($data,$items)
{
     $this->db->insert('orders',$data);
        $insertId = $this->db->insert_id();
        $order_id = $this->db->insert_id();
      foreach ($items as $item) {
                  
                    $item['order_id'] = $order_id;
                    $this->db->insert('order_items', $item);
                }
      //return $this->db->insert_id();
        return $insertId;
}

 public function insert_assign($id,$data)
    {
        $this->db->set('assign_to',$data);   
        $this->db->where('id',$data);
        $this->db->update('orders_item');
        return;
        // $o_id = $this->db->update_id();
        // $query="update orders_item set 'assign_to'=$assign_to where 'id'=$o_id";
        // $this->db->query($query);

    }
 /*public function insert($orders_id)
    {

        $this->db->insert('orders', $data);
        return $this->db->insert_id();

    }
public function add($order_items_id)
{

    $this->db->insert('order_items', $data);
    return $this->db->insert_id();

}*/
    //-- edit function
    function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update();
        return;
    }

 function update($action, $id, $table)
    {
    //$this->db->set('assign_to', $assign_to); //value that used to update column  
    $this->db->where('id', $id); //which row want to upgrade  
    $this->db->update($table, $action);
    return;
      //table name
    }
    /*public function add_assign($assign_to) {

            $data = array(
                            'assign_to' => $assign_to
                            );

            $query = $this->db->insert('orders',$data);

            return $query->result_array();
            }*/

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

    //-- get all users with type 2
    function get_all_order(){
        $this->db->select('o.*');
        $this->db->from('orders o');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

 function get_single_order_info($id){
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

function get_single_order_detailinfo($id){
        $this->db->select('*');
        $this->db->from('order_items');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    function get_all_order_item(){
        $this->db->select('t.*');
        $this->db->select('o.customer_name as cname,o.start_date as sdate,o.end_date as edate');
        $this->db->from('order_items t');
        $this->db->join('orders o','o.id = t.order_id','LEFT');
        //$this->db->order_by('id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //-- image upload function with resize option
    function upload_image($max_size){
            
            //-- set upload pathgif|
            $config['upload_path']  = "./assets/images/";
            $config['allowed_types']= 'jpg|png|jpeg';
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
}
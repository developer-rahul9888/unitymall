<?php 
class Order_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
 
	
	    public function get_all_order($id)
    {
		$this->db->select('order_id,status,date,name,sum(sub_total) as tprice ');
		$this->db->from('merchant_order'); 
		$this->db->where('mid',$id);
		$this->db->where('status','accpted');
		$this->db->order_by('id','desc');
		$this->db->group_by('order_id');
		$query = $this->db->get();
		return $query->result_array();  
    } 
	  
    
    
    public function get_all_order_id($id)
    {$this->db->select('*');
    $this->db->from('orders');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result_array();}
    
    
    
    

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_order($data)
    {
		//$insert = $this->db->insert('orders', $data);
	    return $insert;
	}

    /**
    * Update product
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_order($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('orders', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

    /**
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	
	
	function delete_order($id){
		$this->db->where('id', $id);
		$this->db->delete('orders'); 
	}
	
	
	
	
 public function get_all_pick_order()
    {
		$this->db->select('*');
		$this->db->from('pick_n_drop');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result_array(); 
    }	
	
	
	public function get_all_pick_order_id($id)
    {
		$this->db->select('*');
		$this->db->from('pick_n_drop');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	 function update_pick_order($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('pick_n_drop', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}
	
	
}
?>
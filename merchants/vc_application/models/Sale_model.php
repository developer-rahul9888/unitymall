<?php 
class Sale_model extends CI_Model {
 
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
    * Get sale by his is
    * @param int $sale_id 
    * @return array
    */
	public function get_user($uid)
    {
		$this->db->select('customer_id,status,parent_customer_id');
		$this->db->from('customer');
		$this->db->where('parent_customer_id',$uid);
		$query = $this->db->get();
		return $query->result_array(); 
    } 
	public function get_user_detail($uid)
    {
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('parent_customer_id',$uid);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	function profile($id){
		$this->db->select('*');
		$this->db->from('merchants');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	
	function update_creditor_amt($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('customer', $data);		
                $error = $this->db->error();
						
	}
	
	function update_merchant_amt($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('merchants', $data);		
                $error = $this->db->error();
						
	}
	
	 function insert_creditor_amt($data)
    {
		$insert = $this->db->insert('credit_hstry', $data);
	    return $insert;
	}
	
    public function get_all_sale()
    {
		$this->db->select('*');
		$this->db->from('total_sale');
		$query = $this->db->get();
		return $query->result_array(); 
    }
	    public function get_all_sale1($id)
    {
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
  public function get_all_sale_id($id)
    {
		$this->db->select('*');
		$this->db->from('total_sale');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	 
public function get_customer_info($id)
    {
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('parent_customer_id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    public function get_all_product($id)
    {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('mid',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_sale($data)
    {
		$insert = $this->db->insert('total_sale', $data);
		$insert_id = $this->db->insert_id();

   return  $insert_id;
	    
	}

    /**
    * Update sale
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_sale($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('orders', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

    /**
    * Delete sale
    * @param int $id - sale id
    * @return boolean
    */
	
	
	function delete_sale($id){
		$this->db->where('id', $id);
		$this->db->delete('orders'); 
	}
	
	public function get_all_tax()
    {
		$this->db->select('id,amount,title,type');
		$this->db->from('tax');
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	   public function update_product_qty($id,$qty) { 
       $this->db->query("update product set p_qty = p_qty - ".$qty." where id='".$id."'");
  }

}
?>
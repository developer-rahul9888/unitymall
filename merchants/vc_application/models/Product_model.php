<?php 
class Product_model extends CI_Model {
 
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
    public function get_all_product($uid)
    {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('mid',$uid);
		$query = $this->db->get();
		return $query->result_array(); 
    }

    public function get_all_category()
    {
		$this->db->select('id,c_name');
		$this->db->from('categorys');
		$this->db->where('position','');
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	 public function get_all_tren_category()
    {
		$this->db->select('id,c_name');
		$this->db->from('categorys');
		$this->db->where('position','trending_services');
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	 public function get_all_on_demand_services_category()
    {
		$this->db->select('id,c_name');
		$this->db->from('categorys');
		$this->db->where('position','on_demand_services');
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	public function get_on_dmnd_category()
    {
		$this->db->select('id,c_name');
		$this->db->from('categorys');
		$this->db->where('position','on_demand_services');
		$query = $this->db->get();
		return $query->result_array(); 
    }

	    public function get_all_product1($id)
    {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
  public function get_all_product_id($id)
    {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	public function get_all_tax()
    {
		$this->db->select('id,amount,title,type');
		$this->db->from('tax');
		$query = $this->db->get();
		return $query->result_array(); 
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_product($data)
    {
		$insert = $this->db->insert('product', $data);
$insert_id = $this->db->insert_id();
		if($insert == TRUE) {
		$string = str_replace(' ', '-', $data['pname']);
        $pid = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
		$pid = strtolower($pid.'-'.$insert_id);
		$sku = '#'.$insert_id;
		$this->db->where('id', $insert_id);
        $this->db->update('product', array('p_id'=>$pid, 'sku'=>$sku));			
		}
	    return $insert;
	}

    /**
    * Update product
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_product($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('product', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

    /**
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	
	
	function delete_product($id) {
		$this->db->where('id', $id);
		//$this->db->where('mid', $mid);
		$this->db->delete('product'); 
	}
	
public function get_commercial_detail($id)
    {
		$this->db->select('merchant_id');
		$this->db->from('merchants_comm_supp_auth');
		$this->db->where('merchant_id',$id);
		$query = $this->db->get();
		return $query->num_rows(); 
    }
		
	
	function insert_commercial_detail($data)
    {
		$insert = $this->db->insert('merchants_comm_supp_auth', $data);
	    return $insert;
	}
	
	function update_commercial_detail($id, $data)
    {
		$this->db->where('merchant_id', $id);
		$this->db->update('merchants_comm_supp_auth', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

		public function get_all_commercial_detail($id)
    {
		$this->db->select('*');
		$this->db->from('merchants_comm_supp_auth');
		$this->db->where('merchant_id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	
	
	public function get_bank_detail_id($id)
    {
		$this->db->select('merchant_id');
		$this->db->from('merchants_bank_detail');
		$this->db->where('merchant_id',$id);
		$query = $this->db->get();
		return $query->num_rows(); 
    }
	
	function insert_bank_detail($data)
    {
		$insert = $this->db->insert('merchants_bank_detail', $data);
	    return $insert;
	}
	
	  function update_bank_detail($id, $data)
    {
		$this->db->where('merchant_id', $id);
		$this->db->update('merchants_bank_detail', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

	public function get_all_bank_detail($id)
    {
		$this->db->select('*');
		$this->db->from('merchants_bank_detail ');
		
		$this->db->where('merchant_id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
	
	
}
?>
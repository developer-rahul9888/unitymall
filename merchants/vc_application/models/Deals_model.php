<?php 
class Deals_model extends CI_Model {
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
    * Get deals by his is
    * @param int $deals_id 
    * @return array
    */	 public function get_all_category()    {		$this->db->select('id,c_name');		$this->db->from('categorys');		$query = $this->db->get();		return $query->result_array();     }
    public function get_all_deals($mid)
    {
		$this->db->select('*');
		$this->db->from('deals');
		$this->db->where('mid',$mid);
		$query = $this->db->get();
		return $query->result_array(); 
    }
 
  public function get_all_deals_id($id,$mid)
    {
		$this->db->select('*');
		$this->db->from('deals');
		$this->db->where('id',$id);
		$this->db->where('mid',$mid);
		$query = $this->db->get();
		return $query->result_array(); 
    } 

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_deals($data)
    {
		$insert = $this->db->insert('product', $data);$insert_id = $this->db->insert_id();		if($insert == TRUE) {		$string = str_replace(' ', '-', $data['pname']);        $pid = preg_replace('/[^A-Za-z0-9\-]/', '', $string);		$pid = strtolower($pid.'-'.$insert_id);		$sku = strtolower(10000+$insert_id);		$this->db->where('id', $insert_id);		$this->db->update('product', array('p_id'=>$pid, 'sku'=>$sku));			}	    return $insert;
	}

    /**
    * Update deals
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_deals($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('deals', $data);		
                $error = $this->db->error();
                if(empty($error['message'])) { return true; }
                else { return false; }
	}

    /**
    * Delete deals
    * @param int $id - deals id
    * @return boolean
    */ 
	function delete_deals($id, $mid) {
		$this->db->where('id', $id);
		$this->db->where('mid', $mid);
		$this->db->delete('deals'); 
	} 
}
?>
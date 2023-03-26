<?php 
class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
	function validate($user_name, $password)
	{  
                $this->db->select('*');
		$this->db->from('merchants');
		$this->db->where('email', $user_name);
		$this->db->where('pass_word', $password);
		$query = $this->db->get();
                if(count($query->result_array())==1) { 
                 $return['login'] = 'true';
			foreach ($query->result() as $row)
			 {
    			$return['user_id'] = $row->id;
    			$return['d_name'] = $row->d_name;
    			$return['email'] = $row->email;
    			$return['status'] = $row->status;
    			$return['access'] = $row->access;
			 }
			return $return;
                }
                else { return false ; }
	}

    /**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	/*function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); 
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}*/
	
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	
	function create_member()
	{

		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('merchants');

        //if($query->num_rows > 0){
         if(count($query->result_array()) > 0) { 
        	return 'false';
		}else{ 
			$new_member_insert_data = array(
				'd_name' => $this->input->post('dname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'merchant_id' => $this->input->post('email'),
				'gst' => $this->input->post('gst'),
				'store_name' => $this->input->post('store_name'),
				'access' => $this->input->post('access'), 
				'status' => 'deactive',
				'pass_word' => md5($this->input->post('password'))						
			);
			  $this->db->insert('merchants', $new_member_insert_data); 
                          $insert_id = $this->db->insert_id();

				$this->db->insert('merchant_meta', array('merchant_id'=>$insert_id)); 
				$this->db->insert('merchants_comm_supp_auth', array('merchant_id'=>$insert_id));
				$this->db->insert('merchants_bank_detail', array('merchant_id'=>$insert_id ,'gst'=>$this->input->post('gst') ));
				
				$dname = $this->input->post('dname');
				$email = $this->input->post('email');
				$merchant_n = substr($dname,0,2).''.substr($email,0,2).''.$insert_id;
                $merchant_no = strtolower($merchant_n);
				
				$merchant_data = array('merchant_id'=>$merchant_no);
				$this->db->where('id', $insert_id);
		        $this->db->update('merchants', $merchant_data);		
                $error = $this->db->error();
                if(!empty($error['message'])) { return 'merchant'; }

		    return $insert_id;
		}
	      
	}//create_member
	
	
		function verify_customer()
	{
        $otp=$this->input->post('otp');
		$otp_exist=$this->session->userdata('otp_number');
		$this->db->where('parent_customer_id', $this->input->post('phone'));
		$query1 = $this->db->get('customer');
		$card_no = $query1->result_array(); 
		   
        //if($query->num_rows > 0){
        
		if(count($query1->result_array()) > 2) { 
        	return 'false al_phone';
		} 
		 elseif ($otp=='') {
			 $phone = $card_no[0]['phone'];
			$this->session->set_userdata('no_veryfied','no');
			 if($phone != '') {
				 $otp_crt = rand(1000,9999);
				 $data['veryfied_msg_otp'] = $otp_crt;
				 $this->session->set_userdata('otp_number',$otp_crt);
			 $sms_msg = urlencode("Your OTP is ".$otp_crt.".\n
Thank you
Team Wishzon");
				
					
					$smstext = "http://103.16.101.52/sendsms/bulksms?username=bsz-aurasway&password=".$this->config->item('sms_pass')."&type=0&dlr=1&destination=".$phone."&source=AURASW&message=".$sms_msg;

					
					file_get_contents($smstext);
					

					
					
		}
			$data['veryfied_msg']="true";
			return 'send_otp';
		} 
		 elseif ($otp!=$otp_exist) {
			 
			 return 'wrong_otp';
			 
		 } elseif ($otp == $otp_exist) { 
				$this->session->set_userdata('auth',$otp);
				return 'auth_verify';
			}
		 
		 
	      
	}//create_member
	
		function create_ondemand_member($image)
	{

		$this->db->where('phone', $this->input->post('phone'));
		$query = $this->db->get('on_demand');

        //if($query->num_rows > 0){
         if(count($query->result_array()) > 0) { 
        	return 'false';
		}else{ 
			$new_member_insert_data = array(
				'name' => $this->input->post('dname'),
				'phone' => $this->input->post('phone'),
				'category' => $this->input->post('category'),						
				'city' => $this->input->post('city'),						
				'state' => $this->input->post('state'),						
				'image' => $image,						
			);
			  $this->db->insert('on_demand', $new_member_insert_data); 
			  $insert_id = $this->db->insert_id();
			  $error = $this->db->error();
                if(!empty($error['message'])) { return 'success'; }
           return $insert_id;
		}
	      
	}//create_member

	
	
	function select_member(){
		$this->db->select('*');
		$this->db->from('merchants');
		$query = $this->db->get();
		return $query->result_array(); 
	}
	
	 function forgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('merchants'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
	
	
	
	function profile($id){
		$this->db->select('*');
		$this->db->from('merchants');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
	}
	
	
		public function update_changePassword($data_to_store)
{
	$id = $this->session->userdata('user_id'); 
	 $this->db->where('id', $id);
	     $this->db->update('merchants', $data_to_store);	
            return TRUE;
    }
	
	  public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT * from merchants where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass = md5($passwordplain);
        /*$this->db->where('email', $email);
        $this->db->update('customer', $newpass); */
        $this->db->query("update merchants set pass_word='".$newpass."' where email = '".$email."' ");       
         
        $to = $email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
				$headers .= 'From: wishzon <info@wishzon.com>' . "\r\n"; 
				$subject = 'Forgot password at wishzon';
				
				$message='Dear '.$row[0]['d_name'].','. "\r\n";
        $message.='<br><br>Thanks for contacting regarding to forgot password,<br> Your temp password is <b>'.$passwordplain.'</b>'."\r\n";
        $message.='<br>Please update your password.';
        $message.='<br><br>Thanks & Regards';
        $message.='<br>wishzon'; 
				$mail= mail($to,$subject,$message,$headers);
if ($mail) {
     return 'true';
} else {
   return 'false';
}     
}
else {  return 'error'; }
} 
	
	
}


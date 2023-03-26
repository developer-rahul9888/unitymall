<?php 
class User extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
       	$this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
		$this->load->model('Users_model');
        
    }

	public function network_distribution() {
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
			$order_id = $this->input->post('order_id');
			$cust_id = $this->input->post('cust_id');
			$how_to_pay = $this->input->post('how_to_pay');
			$comm_dis = $this->input->post('comm_dis');
			$reward_point = $this->input->post('reward_point');
			$data['profile'] = $this->Users_model->get_reuser_with_direct_info($cust_id);
			$user = $data['profile'][0];
			$user['comm_dis'] = $comm_dis;
			$user['reward_point'] = $reward_point;
			$this->payment_distribution($user);

			$orderItems = $this->Users_model->get_order_item($order_id);
			$productIds = array_column($orderItems,'product_id');
			
			if($productIds) {
				$date = date('Y-m-d H:i:s');
				$products = $this->Users_model->get_order_item_product($productIds);
				foreach($products as $product) {
					$nexttdate = '';
					if($product['roi_type'] == 'D') {
						$nexttdate = date('Y-m-d',strtotime("+ 1 day",strtotime($date)));
					}
					if($product['roi_type'] == 'W') {
						$nexttdate = date('Y-m-d',strtotime("+ 7 day",strtotime($date)));
					}
					if($product['roi_type'] == 'M') {
						$nexttdate = date('Y-m-d',strtotime("+ 1 Month",strtotime($date)));
					}
					if($nexttdate) {
						$dataToStore = [
							'user_id' => $user['id'],
							'amount' => $product['roi_amount'],
							'roi_count' => $product['roi_count'],
							'type' => $product['roi_type'],
							'status' => 'Active',
							'order_id' => $order_id,
							'pay_date' => $nexttdate
						];
						$this->Users_model->add_salary($dataToStore);
					}
				}
			}
			
			$response = array(
				'status' => true,
				'message' => 'Success'
			);
			echo json_encode($response);
		}
	}

	function payment_distribution($user) {
		$package_level = 1; $p_amount = 1000;
		$cust_id = $user['id'];
		$distribution_amount = $user['comm_dis'] + 0;
		$reward_point = $user['reward_point'] + 0;
		$total_sbv = $user['sbv']+$distribution_amount;
		$direct_id = $user['did'];
		$points = $user['points'] + $distribution_amount + 0;
		$reward_wallet = $user['reward_wallet'] - $reward_point + 0;
		$data_profile_array = array('reward_wallet'=>$reward_wallet);
		$this->Users_model->update_profile($cust_id,$data_profile_array);
		if($reward_point > 0) {
			$data_to_store = array(
							'user_id' => $cust_id,
							'send_to' => $cust_id,
							'status' => 'Debit',
							'wallet_type ' => 'Reward Point',
							'amount ' => $reward_point
						);
			$this->Users_model->add_transactions($data_to_store);
		}

		if($user['consume'] == 0) {
			$data_to_store = array('user_level'=>1,'sbv' => $total_sbv, 'package_used' => date('Y-m-d H:i:s'));
			if($total_sbv >= 20) {
				$this->first_level_income($user['direct_customer_id'],$cust_id);
				$data_to_store['consume'] = 1;
			}

			if($total_sbv >= 100) {
				$this->Users_model->load_wallet($direct_id, '1', 'direct' );
				$this->autopool($cust_id,$direct_id,$package_level,$p_amount,$user['ddirect']+1);
				$data_to_store['user_level'] = 2;
			}
			$this->Users_model->update_profile($cust_id,$data_to_store);

			if($total_sbv >= 100) {
				if($user[ 'ddirect' ] >= 10 && $user[ 'dbooster' ]==0) {
					$this->Users_model->update_profile($direct_id,array('booster'=>1));
				}
				elseif($user[ 'ddirect' ] >= 15 && $user[ 'dbooster' ]==1) {
					$this->Users_model->update_profile($direct_id,array('booster'=>2));
				}
			}

			} else {
				if($total_sbv >= 100 && $user[ 'user_level' ]==1) {
					$this->Users_model->load_wallet($direct_id, '1', 'direct' );
					$this->autopool($cust_id,$direct_id,$package_level,$p_amount,$user['ddirect']);
					$this->Users_model->update_profile($cust_id,array('user_level'=>2));
					if($user[ 'ddirect' ] >= 10 && $user[ 'dbooster' ]==0) {
						$this->Users_model->update_profile($direct_id,array('booster'=>1));
					}
					elseif($user[ 'ddirect' ] >= 15 && $user[ 'dbooster' ]==1) {
						$this->Users_model->update_profile($direct_id,array('booster'=>2));
					}
				} 
				elseif($user[ 'user_level' ]==1) {
					$data_to_store = array('sbv' => $total_sbv);
					$this->Users_model->update_profile($cust_id,$data_to_store);
				}
			}
	}

	function autopool($user_id,$direct_id,$package_level,$package_name,$directs) {
		/* start **/
		$placement_id = array();
		//$user_info = $this->Users_model->get_user_info($user_id);
		$check = $this->Users_model->check_autopool($direct_id);
		if(!empty($check)) {	
			$placement_id = $check;
		} else {  $placement_id = $this->Users_model->get_autopool_placement(); }
				$data_to = array(
				'user_id' => $user_id,
				'parent_id' => $placement_id[0]['id'],
				'direct_id' => $direct_id
				); 
				$insert_id = $this->Users_model->insert_autopool_data($data_to); 
				$this->Users_model->add_childress(array('user_id' => $user_id,'matrix_id'=>$insert_id));
				$this->Users_model->update_autopool_child_num($placement_id[0]['id']);
				if($placement_id[0]['children']==0 && 1==2) {
					$sponsor_data = $this->Users_model->get_autopool_by_id($placement_id[0]['parent_id']);
					if(!empty($sponsor_data)) {
						$data_to_store = array(
						'user_id' => $sponsor_data[0]['user_id'],
						'amount' => 100,
						'user_send_by ' => $user_id,
						'type' => 'Upgrade Income',
						'pay_level' => 2,
						'status ' => 'Active'
						);
						$this->Users_model->add_income($data_to_store);
						$data_to_store = array(
							'user_id' => $sponsor_data[0]['user_id'],
							'send_to' => $sponsor_data[0]['user_id'],
							'amount' => 100,
							'status ' => 'Credit',
							'wallet_type' => 'Point',
							);
						$this->Users_model->add_transactions($data_to_store);
						$this->Users_model->load_wallet($sponsor_data[0]['user_id'], 100, 'points' );
					}
				} else {
					if($placement_id[0]['children']<2) { $coin = 50; } else { $coin = 100; }
					$data_to_store = array(
						'user_id' => $direct_id,
						'amount' => $coin,
						'user_send_by ' => $user_id,
						'type' => 'Upgrade Income',
						'pay_level' => 1,
						'status ' => 'Active'
					);
					$this->Users_model->add_income($data_to_store);
					$data_to_store = array(
							'user_id' => $direct_id,
							'send_to' => $direct_id,
							'amount' => $coin,
							'status ' => 'Credit',
							'wallet_type' => 'Point',
					);
					$this->Users_model->add_transactions($data_to_store);
					$this->Users_model->load_wallet($direct_id, $coin, 'points' );
				}
				if($placement_id[0]['children']<2) {
					$this->Users_model->load_wallet($placement_id[0]['user_id'], $package_name, 'sbv' );
					$this->Users_model->load_children($placement_id[0]['user_id'],1,'level_1' );
				}
				if($placement_id[0]['children']==1) {
					$package_level = 3;
					$this->Users_model->update_profile($placement_id[0]['user_id'],array('user_level'=>3));
					$this->reverse_matrix_income($placement_id[0]['user_id'],$placement_id[0]['direct_id'],$package_level);
				}
	
	}

	function first_level_income($direct_customer_id,$cust_id) {
		$p = 0;
		$dis_level = 1;
		$dis_income = array(5,4,2,2,1,1,1);
		while($p<6) {
			$direct_user = $this->Users_model->profile_by_customer_id($direct_customer_id);
				if(!empty($direct_user)) {
						$data_to_store = array(
								'user_id' => $direct_user[0]['id'],
								'type' => 'Level Income',
								'pay_level' => $dis_level,
								'amount' => $dis_income[$p],
								'status ' => 'Active',
								'user_send_by ' => $cust_id
						);
						$this->Users_model->add_income($data_to_store);
						$p++;
						$dis_level++;
						$direct_customer_id = $direct_user[0]['direct_customer_id'];
				} else { $p = 40; }
			}
	}

	function reverse_matrix_income($user_id,$direct_id,$package_level) {
		$user_info = $this->Users_model->get_user_info($user_id);
		$dis_level = 1;
		$p = 0;
		$sponsor = $user_info[0]['parent_id'];
		while($p<6) {
		$sponsor_data = $this->Users_model->get_autopool_by_id($sponsor);
		if(!empty($sponsor_data)) {
		if($package_level==3 && $dis_level == 2) { $level_inome = 100; $level='level_2'; }
		elseif($package_level == 4 && $dis_level == 3) { $level_inome = 200; $level='level_3'; }
		elseif($package_level == 5 && $dis_level == 4) { $level_inome = 800; $level='level_4'; }
		elseif($package_level == 6 && $dis_level == 5) { $level_inome = 6400; $level='level_5'; }
		elseif($package_level == 7 && $dis_level == 6) { $level_inome = 102400; $level='level_6'; }
		else { $level_inome = 0; }
		if($level_inome > 0) {
				if($sponsor_data[0][$level] < pow(2, $dis_level)) { $coin = $level_inome/2; } else { $coin = $level_inome; }
				$data_to_store = array(
					'user_id' => $sponsor_data[0]['user_id'],
					'type' => 'Upgrade Income',
					'pay_level' => $dis_level,
					'amount' => $coin,
					'status ' => 'Active',
					'user_send_by ' => $user_id,
					'description ' => $package_level
				);
				// if($sponsor_data[0]['user_level']>=$package_level) {
				// 	$this->Users_model->load_wallet($data_to_store['user_id'], $coin, 'points' );
				// } else { 
				// 	$data_to_store['status'] = 'Pending';
				// }

				

				$this->Users_model->load_wallet($data_to_store['user_id'], $coin, 'points' );
				$this->Users_model->load_children($sponsor_data[0]['user_id'],1,$level);
				$this->Users_model->add_income($data_to_store);

				$data_income = array(
					'user_id' => $sponsor_data[0]['user_id'],
					'send_to' => $sponsor_data[0]['user_id'],
					'amount' => $coin,
					'status ' => 'Credit',
					'wallet_type' => 'Point',
				);
				$this->Users_model->add_transactions($data_income);

				$p=50;
				}
				$sponsor = $sponsor_data[0]['parent_id'];
				} else { $p=50; }
				$p++;
				$dis_level++;
		}
		if(!empty($sponsor_data)) {
				$cust_id = $sponsor_data[0]['user_id'];
				if($sponsor_data[0]['level_2'] >= 3 && $sponsor_data[0][ 'user_level' ]==3) {
					$package_level = 4;
					$this->Users_model->update_profile($cust_id,array('user_level'=>4));
					$this->reverse_matrix_income($cust_id,$direct_id,$package_level);
				}
				if($sponsor_data[0]['level_3'] >= 7 && $sponsor_data[0][ 'user_level' ]==4) {
					$package_level = 5;
					$this->Users_model->update_profile($cust_id,array('user_level'=>5));
					$this->reverse_matrix_income($cust_id,$direct_id,$package_level);
				}
				if($sponsor_data[0]['level_4'] >= 15 && $sponsor_data[0][ 'user_level' ]==5) {
					$package_level = 6;
					$this->Users_model->update_profile($cust_id,array('user_level'=>6));
					$this->reverse_matrix_income($cust_id,$direct_id,$package_level);
				}
				if($sponsor_data[0]['level_5'] >= 31 && $sponsor_data[0][ 'user_level' ]==6) {
					$package_level = 7;
					$this->Users_model->update_profile($cust_id,array('user_level'=>7));
					$this->reverse_matrix_income($cust_id,$direct_id,$package_level);
				}
				if($sponsor_data[0]['level_6'] >= 63 && $sponsor_data[0][ 'user_level' ]==7) {
					$package_level = 7;
					$this->Users_model->update_profile($cust_id,array('user_level'=>8));
					$this->reverse_matrix_income($cust_id,$direct_id,$package_level);
				}
		}		
	}

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		if($this->session->userdata('is_admin_logged_in')){ redirect(base_url().'welcome');    }
               else{ $this->load->view('login');	     }
	}

    /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	

    /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	

		$this->load->model('Users_model');

		$user_name = $this->input->post('user_name');
		$password = $this->__encrip_password($this->input->post('password'));

		$is_valid = $this->Users_model->validate($user_name, $password);
		
		if($is_valid['login']=='true')
		{
			$data = array('user_name' => $user_name, 'permission' =>$is_valid['permission'] , 'full_name'=>$is_valid['full_name'], 'email'=>$is_valid['email'], 'role'=>$is_valid['user_level'], 'user_id'=>$is_valid['user_id'], 'is_admin_logged_in' => true);
			$this->session->set_userdata($data);
			redirect(base_url().'welcome');
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('login', $data);	
		}
	}	

	 function admin_welcome(){ 
                 if($this->session->userdata('is_admin_logged_in')){  }
               else{  redirect(base_url().'');  }   

		$data['main_content'] = 'welcome_message'; 
        $this->load->view('includes/admin/template', $data); 
   
	 }
    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		//$this->load->view('signup_form');	
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('signup_form');
		}
		
		else
		{			
			$this->load->model('Users_model');
			
			if($query = $this->Users_model->create_member())
			{
				$this->load->view('signup_successful');			
			}
			else
			{
				$this->load->view('signup_form');			
			}
		}
		
	}
	
	public function forgotPassword()
   {
	   $this->load->model('Users_model');
         $email = $this->input->post('user_email');      
         $findemail = $this->Users_model->forgotPassword($email);  
         if($findemail){
          $return = $this->Users_model->sendpassword($findemail);     
          if($return=='true') { echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Please check your email '.$email;
          echo '</div>';   
           } else { 
             echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Email not send.';
          echo '</div>';  
             }   
           }else{ 
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Email not exist please check your email.';
          echo '</div>';  
          }
   }
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
<?php 
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->model('profile_meta');	
	$this->load->model('product_model');
    $this->load->helper('string');
    }

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */	
	function index()
	{
		if($this->session->userdata('is_logged_in')){
			redirect(base_url().'admin/welcome');
        }else{
        	$this->load->view('admin/login');	
        }
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
		
		if($is_valid['login']=='true' && $is_valid['status']=='pending')
		{ 
			$data['message_error_pending'] = TRUE;
			$this->load->view('admin/login', $data);	
                }
		elseif($is_valid['login']=='true')
		{
			$data = array('display_name'=>$is_valid['d_name'], 'email'=>$is_valid['email'],  'user_id'=>$is_valid['user_id'], 'access'=>$is_valid['access'], 'is_logged_in' => true);
			$this->session->set_userdata($data);
			redirect(base_url().'admin/welcome');
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}	

	 function admin_welcome(){ 
        if(!$this->session->userdata('is_logged_in')){ redirect(base_url().'admin/login');  }
		$mid = $this->session->userdata('user_id');
		$data['main_content'] = 'admin/welcome'; 
		$data['merchant_data'] = $this->profile_meta->get_merchant_data($mid); 
        $this->load->view('includes/admin/template', $data); 
	 }
    /**
    * The method just loads the signup view
    * @return void
    */
	function signup()
	{
		$this->load->view('admin/register');	
	}
	

    /**
    * Create new user and store it in the database
    * @return void
    */	
	function create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('dname', 'display name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');  //|is_unique[merchants.email]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('cpassword', 'password confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('gst', 'gst', 'required');
		$this->form_validation->set_rules('store_name', 'store name', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/register');
		}
		
		else
		{			
			$this->load->model('Users_model');
			$query = $this->Users_model->create_member();
			if($query != 'false' && is_numeric($query))
			{
				$hash = md5(md5($this->input->post('email').' Bl!ssz0n'));
				$url = 'http://demandsanddelivery.com/merchants/admin/reset-password/'.$query.'/'.$hash;
				$to = $this->input->post('email');
				$subject = 'Demands and delivery account activation email';
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $headers .= 'From: Demands and delivery <noreply@demandsanddelivery.com>' . "\r\n";
				$message = '<h3>Confirmation email</h3>
				<br>Click here '.$url.' for activate your Demands and delivery account.
				<br><br>Mail send from Demands and delivery http://demandsanddelivery.com/';

				mail($to,$subject,$message,$headers);
				
				$this->session->set_flashdata('register', 'true'); 
				$this->load->view('admin/login');
			}
			else
			{  
				$this->session->set_flashdata('register', 'already'); 
				$this->load->view('admin/register');			
			}
		}
		
	}
	
	
	
		function verify_customer()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		
		$this->form_validation->set_rules('phone', 'phone', 'required');
		
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		
		else
		{			
			$this->load->model('Users_model');
			$query = $this->Users_model->verify_customer();

			if($query == 'false al_phone')
			{  
				$this->session->set_flashdata('register', 'al_phone'); 
				$this->load->view('register');			
			}elseif($query == 'send_otp')
			{
				$this->session->set_flashdata('register', 'sendotp'); 
				$this->load->view('register');
			}
			elseif($query == 'wrong_otp')
			{
				$this->session->set_flashdata('register', 'wrong_otp'); 
				$this->load->view('register');
			}
			
			elseif($query != 'false' && is_numeric($query))
			{
				$this->session->set_flashdata('register', 'true'); 
				$this->load->view('register');
			}
			elseif($query == 'auth_verify')
			{
				$this->session->set_flashdata('register', 'auth_verify'); 
				$this->load->view('register');
			}
			
			else
			{  
				$this->session->set_flashdata('register', 'email'); 
				$this->load->view('register');

				
			}
		}
		
	}
	
	
	
	 function ondemand_member()
	{
		
		//$this->load->view('admin/ondemand_member');	
	} 
	
		function ondemand_create_member()
	{
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('dname', 'display name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		
		// file upload start here

			$config['upload_path'] ='images/ondemand/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('image'))
{ 
 $image_data = $this->upload->data();
$image = $image_data['file_name'];
					}else{
                         $errors = $this->upload->display_errors();
						$image = '';
			        }
			        //----- end file upload -----------
			
			
		
		if($this->form_validation->run() == FALSE)
		{
			//$this->load->view('admin/ondemand_member');
		}
		
		else
		{		
			$this->load->model('Users_model');
			$query = $this->Users_model->create_ondemand_member($image);
			if($query != 'false' && is_numeric($query))
			{
				$this->session->set_flashdata('register', 'true'); 
				redirect(base_url().'admin/ondemand_create_member');
			}
			else
			{   
				$this->session->set_flashdata('ondemand', 'already'); 
				//$this->load->view('admin/ondemand_member');			
			}
		}
		
		       $data['category'] = $this->product_model->get_on_dmnd_category();
		       //$data['main_content'] = 'admin/ondemand_member';
			   $this->load->view('admin/ondemand_member',$data);	
		
	}
	
	
	function forgot_password(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            $this->load->model('Users_model');
         $email = $this->input->post('user_email');      
         $findemail = $this->Users_model->forgotPassword($email);  
         if($findemail){
          $return = $this->Users_model->sendpassword($findemail);     
          if($return=='true') { echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Please check your email.';
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
		$this->load->view('admin/forgot_password');
	}
	
	
	/**
    * Destroy the session, and logout the user.
    * @return void
    */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}

}
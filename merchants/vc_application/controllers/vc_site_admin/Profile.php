<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('profile_meta');	
        $this->load->model('product_model');	

        if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); }
       // if($this->session->userdata('role')!='5') { redirect('admin/search'); }
    }
	
  public function index() {
    	  
	  //product id 
        $mid = $this->session->userdata('user_id');


        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            /*form validation*/  
              $this->form_validation->set_rules('d_name', 'display name', 'required|trim|min_length[3]');
			//$this->form_validation->set_rules('brands', 'brands', 'required|trim');
			//$this->form_validation->set_rules('business_type', 'business type', 'required|trim');
			$this->form_validation->set_rules('address_s_1', 'address street 1', 'required|trim');
			$this->form_validation->set_rules('city', 'city', 'required|trim');
			$this->form_validation->set_rules('state', 'state', 'required|trim');
			$this->form_validation->set_rules('zip', 'pin code', 'required|trim');
			$this->form_validation->set_rules('country', 'country', 'required|trim');
			
            $category = $this->input->post('business_type');
			if(empty($category)) {
			$this->form_validation->set_rules('business_type', 'category', 'required');
			}
			
			if($this->session->userdata('access')==1){
			
			$pickup_checkbox = $this->input->post('pickup_checkbox');
			if($pickup_checkbox=='') {
			$this->form_validation->set_rules('p_address_s_1', 'pickup address street 1', 'required|trim');
			$this->form_validation->set_rules('p_city', 'pickup city', 'required|trim');
			$this->form_validation->set_rules('p_state', 'pickup state', 'required|trim');
			$this->form_validation->set_rules('p_zip', 'pickup pin code', 'required|trim');
			}
			 
			$return_checkbox = $this->input->post('return_checkbox');
			if($return_checkbox=='') {
			$this->form_validation->set_rules('r_address_s_1', 'return address street 1', 'required|trim');
			$this->form_validation->set_rules('r_city', 'return city', 'required|trim');
			$this->form_validation->set_rules('r_state', 'return state', 'required|trim');
			$this->form_validation->set_rules('r_zip', 'return pin code', 'required|trim');
			}
			
			$this->form_validation->set_rules('o_name', 'operations name', 'required|trim');
			$this->form_validation->set_rules('o_email', 'operations email', 'required|trim');
			$this->form_validation->set_rules('o_designation', 'operations designation', 'required|trim');
			$this->form_validation->set_rules('o_phone', 'operations contact no', 'required|trim');
			 
			}
			 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
		  // file upload start here
            	$brand_proof = '';
			$config['upload_path'] ='images/profile/business_details/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|txt|docm';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('brand_proof'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/profile/business_details/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $brand_proof = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$brand_proof = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
					
				 
				 // file upload start here
            	$image = 'noimg.jpg';
			$config['upload_path'] ='images/profile/business_details/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('image'))
                    { 
                    if($this->input->post('image_old')!='') unlink('images/profile/business_details/'.$this->input->post('image_old'));
                         $image_data = $this->upload->data();
					    $image = $image_data['file_name'];
					}
            else {
                        $errors = $this->upload->display_errors();
						$image = $this->input->post('image_old');
			        }
				$imagesList = $this->input->post('images_old');
				if(empty($imagesList)) {    $imagesArray = array(); }
                else { $imagesArray = $this->input->post('images_old'); }
				
				 if(!empty($_FILES['p_image']['name'])){
            $filesCount = count($_FILES['p_image']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['p_image']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['p_image']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['p_image']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['p_image']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['p_image']['size'][$i];
				
			$config['upload_path'] ='images/profile/business_details/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
   		    $this->load->library('upload', $config);
				if ($this->upload->do_upload('userFile')) { 
                     $image_data = $this->upload->data();
					 $imagesArray[] = $image_data['file_name'];
				} else { $errors = $this->upload->display_errors();  }
			}
				 }
			        //----- end file upload -----------
				 $imagesValue = json_encode($imagesArray);
			        //----- end file upload -----------
					
					
					
                 $category_val = implode(',',$category);
                $data_to_store = array(
                    'brands' => $this->input->post('brands'),
					'b_details' => $this->input->post('b_details'), 
					'business_type' => $category_val, 
					'address_s_1' => $this->input->post('address_s_1'), 
					'address_s_2' => $this->input->post('address_s_2'), 
					'city' => $this->input->post('city'), 
					'state' => $this->input->post('state'), 
					'zip' => $this->input->post('zip'), 
					'country' => $this->input->post('country'), 
					'pickup_checkbox' => $this->input->post('pickup_checkbox'), 
					'p_address_s_1' => $this->input->post('p_address_s_1'), 
					'p_address_s_2' => $this->input->post('p_address_s_2'), 
					'sector' => $this->input->post('sector'), 
					'p_city' => $this->input->post('p_city'), 
					'p_state' => $this->input->post('p_state'), 
					'p_zip' => $this->input->post('p_zip'), 
					'brand_proof' => $brand_proof,
					'images' => $imagesValue,
					'video' => $this->input->post('video'),
					'return_checkbox' => $this->input->post('return_checkbox'), 
					'r_address_s_1' => $this->input->post('r_address_s_1'), 
					'r_address_s_2' => $this->input->post('r_address_s_2'), 
					'r_city' => $this->input->post('r_city'), 
					'r_state' => $this->input->post('r_state'), 
					'r_zip' => $this->input->post('r_zip'), 
					'o_name' => $this->input->post('o_name'), 
					'o_email' => $this->input->post('o_email'), 
					'o_designation' => $this->input->post('o_designation'), 
					'o_phone' => $this->input->post('o_phone')
					);
					$merchant_data_to_store = array('d_name'=>$this->input->post('d_name'),'status'=>$this->input->post('status'));
             $this->profile_meta->update_merchant($mid, $merchant_data_to_store);
             $return = $this->profile_meta->update_merchant_meta($mid, $data_to_store);

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/profile');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
      if($this->session->userdata('access')==1){
        $data['category'] = $this->product_model->get_all_category();
        $data['tren_category'] = $this->product_model->get_all_tren_category();
	  }else{
        $data['category'] = $this->product_model->get_all_on_demand_services_category();
		$data['tren_category'] = $this->product_model->get_all_tren_category();
	  }

        $data['merchant_data'] = $this->profile_meta->get_merchant_data($mid); 
        $data['merchant_meta'] = $this->profile_meta->get_merchant_meta($mid); 
        //load the view
        $data['main_content'] = 'admin/profile'; 
        $this->load->view('includes/admin/template', $data); 
  }
 
}
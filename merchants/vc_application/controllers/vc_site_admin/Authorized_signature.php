<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authorized_signature extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('product_model');	

        if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); }
       // if($this->session->userdata('role')!='5') { redirect('admin/search'); }
    }
	
  public function index() {
    	  
	  //product id 
        //$id = $this->uri->segment(4);
        $id = $this->session->userdata('user_id');
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('merchant_id'))
        {
            /*form validation*/
              $this->form_validation->set_rules('as_si_name', 'Authorized Signatory  Name', 'required|trim');
			  
              $this->form_validation->set_rules('as_si_desi', 'Authorized Signatory Designation', 'required|trim');
			  
              $this->form_validation->set_rules('as_si_email', 'Authorized Signatory Email', 'required|trim|valid_email');
			  
              $this->form_validation->set_rules('as_si_mob', 'Authorized Signatory Mobile', 'required|trim|min_length[10]');
			
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
		  // file upload start here
            	$image = 'noimg.jpg';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('ci_crt'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/merchantdocs/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $image = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$image = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
                $data_to_store = array(
				 'merchant_id' => $this->input->post('merchant_id'), 
                    'as_si_name' => $this->input->post('as_si_name'),
					'as_si_desi' => $this->input->post('as_si_desi'), 
					'as_si_email' => $this->input->post('as_si_email'), 
					'as_si_mob' => $this->input->post('as_si_mob'), 
					'ci_crt' => $image,
					); 
					
            $already=$this->product_model->get_commercial_detail($id);
					 if($already == 1)
					 {
             $return = $this->product_model->update_commercial_detail($id, $data_to_store);
}else{
$return = $this->product_model->insert_commercial_detail($data_to_store);
}
			 

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/authorized-signature');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['authorised_signature'] = $this->product_model->get_all_commercial_detail($id); 
        //load the view
        $data['main_content'] = 'admin/authorized_signature'; 
        $this->load->view('includes/admin/template', $data); 
  }
 
}
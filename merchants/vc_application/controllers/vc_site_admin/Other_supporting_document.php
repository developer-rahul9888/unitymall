<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Other_supporting_document extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('product_model');	

        if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); } 
    }
	
  public function index() {
    	   
        $id = $this->session->userdata('user_id');
        $image_flag = '';
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('merchant_id'))
        {
			$this->form_validation->set_rules('merchant_id', 'nm', 'trim');
			
            /*form validation*/
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
		  
		  
		  // brfa_sign file upload start here
            	$brfa_sign = '';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('brfa_sign'))
                    { 
                    if($this->input->post('brfa_sign_exist')!='') unlink('images/merchantdocs/'.$this->input->post('brfa_sign_exist'));
                        $image_data = $this->upload->data();
					    $brfa_sign = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$brfa_sign = $this->input->post('brfa_sign_exist');
			        }
			        //----- end file upload -----------
					
					// ci_crt file upload start here
            	$ci_crt = '';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('ci_crt'))
                    { 
                    if($this->input->post('ci_crt_exist')!='') unlink('images/merchantdocs/'.$this->input->post('ci_crt_exist'));
                         $image_data = $this->upload->data();
					    $ci_crt = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$ci_crt = $this->input->post('ci_crt_exist');
			        }
			        //----- end file upload -----------
					
					
					
					// a_prf file upload start here
            	$a_prf = '';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('a_prf'))
                    { 
                    if($this->input->post('a_prf_exist')!='') unlink('images/merchantdocs/'.$this->input->post('a_prf_exist'));
                         $image_data = $this->upload->data();
					    $a_prf = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$a_prf = $this->input->post('a_prf_exist');
			        }
			        //----- end file upload -----------
					
					
					// can_chq file upload start here
            	$can_chq = '';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('can_chq'))
                    { 
                    if($this->input->post('can_chq_exist')!='') unlink('images/merchantdocs/'.$this->input->post('can_chq_exist'));
                         $image_data = $this->upload->data();
					    $can_chq = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$can_chq = $this->input->post('can_chq_exist');
			        }
			        //----- end file upload -----------
		  
		   
		  if($can_chq==''){
			  $this->session->set_flashdata('flash_message', 'Cancelled Cheque');
		  } elseif($a_prf==''){
			  $this->session->set_flashdata('flash_message', 'Address Proof');
		  } else {
                $data_to_store = array(
                     'brfa_sign' => $brfa_sign,
                     'ci_crt' => $ci_crt,
                     'a_prf' => $a_prf,
                     'can_chq' => $can_chq,
					); 
             $already = $this->product_model->get_commercial_detail($id);
					 if($already == 1)  {
                         $return = $this->product_model->update_commercial_detail($id, $data_to_store);
                     } else {
                         $return = $this->product_model->insert_commercial_detail($data_to_store);
                     }

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/other-supporting-document');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
		   }

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['supporting_docs'] = $this->product_model->get_all_commercial_detail($id);
        //load the view
        $data['main_content'] = 'admin/other_supporting_document'; 
        $this->load->view('includes/admin/template', $data); 
  }
 
}
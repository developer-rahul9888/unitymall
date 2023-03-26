<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commercial extends CI_Controller {
	
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
              $this->form_validation->set_rules('r_l_e_name', 'Registered Legal Entity Name', 'required|trim');
			  $this->form_validation->set_rules('e_reg_no', 'Excise Registration No.', 'trim');
			  $this->form_validation->set_rules('s_tax_no', 'Service Tax No', 'trim');
			  $this->form_validation->set_rules('s_e_goods', 'Selling Exempted Goods', 'trim');
			  $this->form_validation->set_rules('pan_no', 'PAN No', 'required|trim');
			  $this->form_validation->set_rules('tan', 'TAN', 'trim');
			  $this->form_validation->set_rules('vt_no', 'VAT TIN No', 'required|trim');
			  
			  $this->form_validation->set_rules('cst_no', 'Central Sales Tax No', 'required|trim'); 
			  $this->form_validation->set_rules('vrg_date', 'VAT Registration Date', 'required|trim'); 
			  $this->form_validation->set_rules('cst_rg_dt', 'Central Sales Tax Registration Date', 'required|trim');
			  
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
		
		
		  // pan proof file upload start here
            	$pan_proof = 'noimg.jpg';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('pan_proof'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/merchantdocs/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $pan_proof = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$pan_proof = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
					
					// tan proof file upload start here
            	$t_proof = 'noimg.jpg';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('t_proof'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/merchantdocs/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $t_proof = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$t_proof = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
					
					
					
					// vt proof file upload start here
            	$vt_proof = 'noimg.jpg';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('vt_proof'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/merchantdocs/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $vt_proof = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$vt_proof = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
					
					
					// vt proof file upload start here
            	$cst_proof = 'noimg.jpg';
			$config['upload_path'] ='images/merchantdocs/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
			
		   if ($this->upload->do_upload('cst_proof'))
                    { 
                    if($this->input->post('avtar_exist')!='') unlink('images/merchantdocs/'.$this->input->post('avtar_exist'));
                         $image_data = $this->upload->data();
					    $cst_proof = $image_data['file_name'];
					}
            else {
                         $errors = $this->upload->display_errors();
						$cst_proof = $this->input->post('avtar_exist');
			        }
			        //----- end file upload -----------
					
					
                $data_to_store = array(
                    'r_l_e_name' => $this->input->post('r_l_e_name'),
                    'e_reg_no' => $this->input->post('e_reg_no'),
                    's_tax_no' => $this->input->post('s_tax_no'),
                    's_e_goods' => $this->input->post('s_e_goods'),
                    'pan_no' => $this->input->post('pan_no'),
                    'tan' => $this->input->post('tan'),
                    'cst_no' => $this->input->post('cst_no'),
                    'vrg_date' => $this->input->post('vrg_date'),
					'cst_rg_dt' => $this->input->post('cst_rg_dt'), 
					'vt_no' => $this->input->post('vt_no'), 
					'merchant_id' => $this->input->post('merchant_id'), 
					'pan_proof' => $pan_proof,
					't_proof' => $t_proof,
					'vt_proof' => $vt_proof,
					'cst_proof' => $cst_proof,
					
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
					redirect('admin/commercial');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['commerc_detail'] = $this->product_model->get_all_commercial_detail($id);
        //load the view
        $data['main_content'] = 'admin/commercial'; 
        $this->load->view('includes/admin/template', $data); 
  }
 
}
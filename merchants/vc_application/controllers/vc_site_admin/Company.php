<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('company_model');	

        if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); }
		
    }
	
  public function index() {
    	
 /*if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
				date_default_timezone_set('America/New_York');
            //form validation
            $oid = $this->input->post('oid'); 
			 
			 $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if (!empty($oid))
            { 
		        $ctype = $this->input->post('type'); 
				if($ctype=='Pending' || $ctype=='Complete') {
					$data_to_store = array('status' => $ctype); 
					foreach($oid as $id){
					  $this->company_model->update_company($id, $data_to_store);
				    }  
	  
				} 

            }//validation run

        }*/

	$data['company'] = $this->company_model->get_all_company();
	
	//load the view
      $data['main_content'] = 'admin/company_list';
      $this->load->view('includes/admin/template', $data);   
  }
  public function add(){
	  date_default_timezone_set('America/New_York');
	  $cimage = '';
	  if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required|trim|min_length[3]');
            $this->form_validation->set_rules('waoic', 'waoic', 'required|trim|numeric');
			//$this->form_validation->set_rules('naic', 'naic', 'required|trim|numeric');
			
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
				
				$data_to_store = array(
                    'name' => $this->input->post('name'),
                    'waoic' => $this->input->post('waoic'),
					'naic' => $this->input->post('naic'),
					'r_address' => $this->input->post('r_address'),
					'm_address' => $this->input->post('m_address'),	
					
					'status' => $this->input->post('status'),	
					'phone' => $this->input->post('phone'),			
					'corporate_family' => $this->input->post('corporate_family'),			
					'a_date' => $this->input->post('a_date'),			
					'insurance_types' => $this->input->post('insurance_types'),			
					'ownership_type' => $this->input->post('ownership_type'),			
					'organization_type' => $this->input->post('organization_type')			
                ); 
                //if the insert has returned true then we show the flash message
				if($this->company_model->store_company($data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					
					redirect('admin/company/add');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
				
                

            }//validation run

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
 
        //load the view
        $data['codenate_name'] = $this->company_model->get_all_cordinat_name();
        $data['main_content'] = 'admin/company_addnew'; 
        $this->load->view('includes/admin/template', $data); 
	  
  }
  
  public function update(){
	  date_default_timezone_set('America/New_York');
	  
	  //product id 
        $id = $this->uri->segment(4);
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('cid'))
        {
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required|trim|min_length[3]');
            $this->form_validation->set_rules('waoic', 'waoic', 'required|trim|numeric');
			//$this->form_validation->set_rules('naic', 'naic', 'required|trim|numeric');
			
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
				
			   
				$data_to_store = array(
                    'name' => $this->input->post('name'),
                    'waoic' => $this->input->post('waoic'),
					'naic' => $this->input->post('naic'),
					'r_address' => $this->input->post('r_address'),
					'm_address' => $this->input->post('m_address'),	
					
					'status' => $this->input->post('status'),	
					'phone' => $this->input->post('phone'),			
					'corporate_family' => $this->input->post('corporate_family'),			
					'a_date' => $this->input->post('a_date'),
					'insurance_types' => $this->input->post('insurance_types'),					
					'ownership_type' => $this->input->post('ownership_type'),			
					'organization_type' => $this->input->post('organization_type')			
                ); 
             $return = $this->company_model->update_company($id, $data_to_store);
              
             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/company/edit/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['company'] = $this->company_model->get_all_company_id($id); 
        $data['codenate_name'] = $this->company_model->get_all_cordinat_name();
        //load the view
        $data['main_content'] = 'admin/company_update'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  public function del(){
  
  $id = $this->uri->segment(4);
   
	  if($this->session->userdata('permission')=='4') {
	   $delete_records = $this->company_model->get_all_company_id($id); 
	   if(!empty($delete_records)) {
		 /* Category  company */
		 $return = $this->company_model->delete_company($id);
	   }
	 }
	  redirect('/admin/company');
	    
 }  
}
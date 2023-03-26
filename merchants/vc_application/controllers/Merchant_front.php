<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant_front extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('search_model');	
    }
	
	public function index()
	{
                $data['page_keywords'] = '';
                $data['page_description'] = '';
                $data['page_slug'] = 'home';
                $data['page_title'] = 'Wishzon';


       if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('send_query')=='true')
        {
          $this->form_validation->set_rules('name', 'name', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|min_length[4]');
          $this->form_validation->set_rules('subject', 'subject', 'required|trim|min_length[4]');
			$this->form_validation->set_rules('description', 'description', 'required');
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
$data_to_store = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'subject' => $this->input->post('subject'),
					'message' => $this->input->post('description')
				); 
                //if the insert has returned true then we show the flash message
				if($this->search_model->user_query($data_to_store) == 'true'){
                    $this->session->set_flashdata('send_query', 'updated');
					//redirect(base_url().'#send-query');
                }else{
                    $this->session->set_flashdata('send_query', 'not_updated');
                }
				
                

            }//validation run
			
        } 
		

	        $data['main_content'] = 'home_page';
            $this->load->view('includes/front/front_template', $data); 

	}
	
	public function merchant_page(){
		
                $data['page_keywords'] = '';
                $data['page_description'] = '';
                $data['page_slug'] = 'merchant_page';
                $data['page_title'] = 'Wishzon Merchant';
		
		$merchant_id = $this->uri->segment(1);
		$data['merchant'] = $this->search_model->merchant_data($merchant_id);
	        $data['main_content'] = 'merchant_page';
            $this->load->view('includes/front/front_template', $data); 
	}

}

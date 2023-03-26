<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bank_detail extends CI_Controller {
	
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
        $id = $this->session->userdata('user_id');
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('merchant_id'))
        {
            /*form validation*/
     $this->form_validation->set_rules('ac_h_name', 'Beneficiary Account Holder  Name', 'required|trim');
	 $this->form_validation->set_rules('ac_no', 'Beneficiary Account No.', 'required|trim');
	 $this->form_validation->set_rules('b_name', 'Bank Name', 'required|trim');
	 $this->form_validation->set_rules('city', 'city', 'required|trim');
	 $this->form_validation->set_rules('br_detail', 'Branch Details', 'required|trim');
			 $this->form_validation->set_rules('ifce_code', 'IFCE Code', 'required|trim');
			 $this->form_validation->set_rules('mirc_code', 'MICR Code', 'required|trim');
			  $this->form_validation->set_rules('gst', 'GST', 'required|trim');
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
                $data_to_store = array(
                     'ac_h_name' => $this->input->post('ac_h_name'),
					 'ac_no' => $this->input->post('ac_no'), 
					 'b_name' => $this->input->post('b_name'),
					 'city' => $this->input->post('city'),
					 'br_detail' => $this->input->post('br_detail'),
					 'ifce_code' => $this->input->post('ifce_code'),
					 'mirc_code' => $this->input->post('mirc_code'),
					 'merchant_id' => $this->input->post('merchant_id'),
					  'gst' => $this->input->post('gst')  
					 
					 ); 
					 $already=$this->product_model->get_bank_detail_id($id);
					 if($already == 1)
					 {
             $return = $this->product_model->update_bank_detail($id, $data_to_store);
}else{
$return = $this->product_model->insert_bank_detail($data_to_store);
}
             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/bank-detail');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['bank_detail'] = $this->product_model->get_all_bank_detail($id);
		//echo '<pre>'; print_r( $data['bank_detail']);die();
        //load the view
       $data['main_content'] = 'admin/bank_detail'; 
        $this->load->view('includes/admin/template', $data); 
  }
 
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('order_model');	

     if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); }
    }
	
  public function index() {
    	 $id = $this->session->userdata('user_id');
	$data['order'] = $this->order_model->get_all_order($id);
	
	//load the view
      $data['main_content'] = 'admin/order_list';
      $this->load->view('includes/admin/template', $data);   
  }
  
  
  
   public function dispute() {
    	
	$data['recharge_order'] = $this->order_model->get_all_dispute();
	
	//load the view
      $data['main_content'] = 'admin/dispute_list';
      $this->load->view('includes/admin/template', $data);   
  }
  
  public function order_view(){ 
	 
	  //order id 
        $id = $this->uri->segment(3);
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('cid'))
        {
            /*form validation*/
              $this->form_validation->set_rules('status', 'status', 'required|trim'); 
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {  
                $data_to_store = array(
                    'status' => $this->input->post('status')
					); 
             $return = $this->order_model->update_order($id, $data_to_store);

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/order/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                } 
            }/*validation run*/

        } 

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['order'] = $this->order_model->get_all_order_id($id); 
        //load the view
        $data['main_content'] = 'admin/order_view'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  
  
  
    public function dispute_view(){ 
	 
	  //order id 
        $id = $this->uri->segment(3);
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('cid'))
        {
            /*form validation*/
              $this->form_validation->set_rules('status', 'status', 'required|trim'); 
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {  
                $data_to_store = array(
                    'status' => $this->input->post('status')
					); 
             $return = $this->order_model->update_order($id, $data_to_store);

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/dispute/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                } 
            }/*validation run*/

        } 

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['order'] = $this->order_model->get_all_order_id($id); 
        //load the view
        $data['main_content'] = 'admin/dispute_view'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  
  
  
  public function del(){
  
  $id = $this->uri->segment(4); 
		 $return = $this->order_model->delete_order($id); 
          $this->session->set_flashdata('delete', 'true'); 
	  redirect(base_url().'admin/order');
 }  
}
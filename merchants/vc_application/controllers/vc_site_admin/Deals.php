<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deals extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('deals_model');
        $this->load->helper('string');		
       if(!$this->session->userdata('is_logged_in')){ redirect('admin/login'); }
    }
	
  public function index() {
    	$mid = $this->session->userdata('user_id');
	$data['deals'] = $this->deals_model->get_all_deals($mid);
	//load the view
      $data['main_content'] = 'admin/deals_list';
      $this->load->view('includes/admin/template', $data);   
  }
  public function add(){ $data['cat'] = $this->deals_model->get_all_category();		
	  $data['image_error'] = 'false';
	  $mid = $this->session->userdata('user_id');	 
	  if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
           //form validation
           $this->form_validation->set_rules('p_name', 'titlt', 'required|trim|min_length[4]');			$this->form_validation->set_rules('category', 'category', 'required|trim');			$this->form_validation->set_rules('p_description', 'description', 'required');			$this->form_validation->set_rules('p_price', 'Price', 'required'); 			$this->form_validation->set_rules('p_qty', 'Qty', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
				// file upload start here
			$config['upload_path'] ='images/product/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '1600';
            //$config['max_height']  = '1600';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('image'))
                    { 
                         $image_data = $this->upload->data();
					    $image = $image_data['file_name'];
					}
            else
                    {
                         $errors = $this->upload->display_errors();
						$image = '';
			        }			
			        //----- end file upload -----------			
				$data_to_store = array( 
				'pname' => $this->input->post('p_name'),
				'description' => $this->input->post('p_description'),
				's_p_n_f_date' => $this->input->post('s_p_n_f_date'),
				's_p_n_to_date' => $this->input->post('s_p_n_to_date'),
				'image' => $image,
				'price' => $this->input->post('p_price'),
				'cost' => $this->input->post('p_price'),
				'p_d_price' => $this->input->post('p_d_price'),
				'p_qty' => $this->input->post('p_qty'),
				'category' => $this->input->post('category'),
				'p_id' => $this->input->post('p_name'),	
				'mid' => $this->session->userdata('user_id'),
				'product_type' => 'Deal'); 
               
				if($this->deals_model->store_deals($data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/deals/add');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }               
            }//validation run
        }
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //load the view 				
        $data['main_content'] = 'admin/deals_addnew'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  public function update(){ 
	  //deals id 
        $id = $this->uri->segment(4);
	  $mid = $this->session->userdata('user_id');
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('cid'))
        {
            /*form validation*/
           $this->form_validation->set_rules('title', 'title', 'required|trim|min_length[4]'); 
			$this->form_validation->set_rules('description', 'description', 'required|trim');
			$this->form_validation->set_rules('terms', 'terms', 'required|trim');
			
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
		  // file upload start here
            	$image = '';
			$config['upload_path'] ='images/deals/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_width']  = '2000';
            //$config['max_height']  = '2000';
   		    $this->load->library('upload', $config);
		   if ($this->upload->do_upload('image'))
                    { 
                    if($this->input->post('image_old')!='') unlink('images/deals/'.$this->input->post('image_old'));
                        $image_data = $this->upload->data();
					    $image = $image_data['file_name'];
					}
            else {
                        $errors = $this->upload->display_errors();
						$image = $this->input->post('image_old');
			        }
				 
			        //----- end file upload ----------- 
                $data_to_store = array(
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
					'terms' => $this->input->post('terms'),
					'status' => $this->input->post('status'),
					'image' => $image
				); 
             $return = $this->deals_model->update_deals($id, $data_to_store);

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/deals/edit/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
 
        $data['deals'] = $this->deals_model->get_all_deals_id($id,$mid); 
        //load the view
        $data['main_content'] = 'admin/deals_update'; 
        $this->load->view('includes/admin/template', $data); 
  }
   
  public function del(){
  $mid = $this->session->userdata('user_id');
  $id = $this->uri->segment(4); 
		 $return = $this->deals_model->delete_deals($id,$mid);  
	  redirect(base_url().'admin/deals');
 }  
}
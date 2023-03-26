<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sale extends CI_Controller {
	
	 public function __construct()
    {
        parent::__construct();
        
		$this->load->library('cart');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('string');	
        $this->load->model('sale_model');		
		
        
    }
	
  public function index() {
    	 
	$data['sale'] = $this->sale_model->get_all_sale();
	
	//load the view
      $data['main_content'] = 'admin/sale_list';
      $this->load->view('includes/admin/template', $data);   
  }
  
/*    public function remove_cart_content() {
    	 
	$id = $this->input->post('cls');
	//$array = array($id);
	print_r($this->session->userdata('cart_contents'));
	//$this->session->unset_userdata('cart_contents');
	//load the view
    echo 'hello';
   } */
	
	
/* public function unset_session_value() {
	
	$id = $this->input->post('cls');
$sess_array = array(
$id => ''
);

// Removing values from session
$this->session->unset_userdata('cart_contents',$sess_array);
echo 'yes';
	
	
  } */

  public function invoice() {
      $id = $this->uri->segment(4);
      $data['customer_info'] = '';
	  
    	$data['invoice'] = $this->sale_model->get_all_sale_id($id); 
	if(!empty($data['invoice'])) {
            $data['customer_info'] = $this->sale_model->get_customer_info($data['invoice'][0]['customer']); 
            if($data['customer_info'][0]['parent_customer_id']!='') { $data['sponser_name'] = $this->sale_model->get_customer_info($data['customer_info'][0]['parent_customer_id']);  }
          }
	//load the view
      $data['main_content'] = 'admin/sale_invoice';
      $this->load->view('includes/admin/template', $data);   
  }
  public function add(){
    
		$id = $this->session->userdata('user_id');
		$data['products'] = $this->sale_model->get_all_product($id);
	echo '<pre>'; print_r($this->session->userdata()); echo '</pre>';
		if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('gtotal')!='')
        {
             $this->form_validation->set_rules('customer', 'customer', 'required|numeric');
                $this->form_validation->set_rules('pid_array', 'product', 'required');
                $this->form_validation->set_rules('payment_type', 'payment type', 'required');
                $this->form_validation->set_rules('before_tax_amount', 'before tax amount', 'required|numeric');
                $this->form_validation->set_rules('gtotal', 'grand total', 'required|numeric');
				$this->form_validation->set_rules('auth_v', 'auth', 'required');
				$this->form_validation->set_message('required', 'please verify your Card');
				$auth = $this->input->post('auth_v');
				 if($auth != $this->session->userdata('otp_number')) {
					$this->form_validation->set_rules('auth_v', 'auth', 'required');
					$this->form_validation->set_message('required', 'please verify your Card');
				} 
                if ($this->form_validation->run() == FALSE) {}
                else {
					$pid = $this->input->post('pid');
					$pname = $this->input->post('pname');
					$code = $this->input->post('code');
					$qty = $this->input->post('qty');
					$size = $this->input->post('size');
					$price = $this->input->post('price');
					$gst = $this->input->post('gst');
					$total_gst = $this->input->post('total_gst');
					$tprice = $this->input->post('tprice');
					$gst_percentage = $this->input->post('gst_percentage');
					$products_array = array();
					
					$this->session->unset_userdata('otp_number');
					$this->session->unset_userdata('auth');
					
					if(count($pid) > 0) {
						for($i=0;$i<count($pid);$i++) {
							$products_array[] = $pid[$i].'~~'.$pname[$i].'~~'.$code[$i].'~~'.$qty[$i].'~~'.$size[$i].'~~'.$price[$i].'~~'.$gst[$i].'~~'.$tprice[$i].'~~'.$gst_percentage[$i];
							$this->sale_model->update_product_qty($pid[$i],$qty[$i]);
						}
					$products = json_encode($products_array);
					}
					$data_store = array(
                    'mid' => $id,
                    'gtotal' => $this->input->post('gtotal'),
                    'products' => $products,
                    'before_tax_amount' => $this->input->post('before_tax_amount'),
                    'discount' => $this->input->post('discount'), 
                    'payment_type' => $this->input->post('payment_type'), 
                    'slip_no' => $this->input->post('slip_no'), 
                    'total_gst' => $this->input->post('total_gst'), 
                    'customer' => $this->input->post('customer')
                    
					);
                //if the insert has returned true then we show the flash message
				if($this->sale_model->store_sale($data_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/sale/add');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
				
            }//validation run

        }
        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //load the view
        $data['tax'] = $this->sale_model->get_all_tax();
        $data['main_content'] = 'admin/sale_addnew'; 
        $this->load->view('includes/admin/template', $data); 
	  
  }
  

    public function misslaneous_add(){
    
		$id = $this->session->userdata('user_id');
		$data['products'] = $this->sale_model->get_all_product($id);
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('p_name', 'titlt', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
				$gtotal = 0;
				$pid = '0';
					$pname = $this->input->post('pname');
					$code = array();
					$qty = $this->input->post('qty');
					$size = array();
					$price = $this->input->post('price');
					$gst = array();
					$total_gst = array();
					$tprice = $this->input->post('tprice');
					$gst_percentage = array();
					$products_array = array();
					if(count($pname) > 0) {
						for($i=0;$i<count($pname);$i++) {
							$products_array[] = $i.'~~'.$pname[$i].'~~0~~'.$qty[$i].'~~0~~'.$price[$i].'~~0~~'.$tprice[$i].'~~0';
							//$this->sale_model->update_product_qty($pid[$i],$qty[$i]);
							
							$total = $qty[$i]*$price[$i];
							$gtotal = $gtotal + $total;
							$ta[] = array(
								'id'=>$i,
								'name'=>$pname[$i],
								'qty'=>$qty[$i],
								'price'=>$price[$i],
								'quantity'=>$price[$i],
								'g_price'=>$tprice[$i],
								);
							
							$this->cart->insert($ta);	
						}
					}
					
					redirect('admin/sale/sale_checkout');

            //validation run

			}
		}

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //load the view
        $data['tax'] = $this->sale_model->get_all_tax();
        $data['main_content'] = 'admin/sale_me'; 
        $this->load->view('includes/admin/template', $data); 
	}
  
    public function credit_add(){ 	
	
	//echo "<pre>"; print_r($this->session->userdata()); echo "</pre>";
	  $mid = $this->session->userdata('user_id');	 
	  if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('find')=='Find')
        {
           //form validation
           $this->form_validation->set_rules('uid', 'User ID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 	
				$customer = $this->sale_model->get_user($this->input->post('uid'));
				if($customer == TRUE) {
					if($customer[0]['status'] == 'deactive') {
						$this->session->set_flashdata('flash_message', 'not_active');
						
					} else {

				$data['main_content'] = 'admin/credit_rec'; 
				$data['userdata'] = $this->sale_model->get_user_detail($this->input->post('uid'));
				$this->session->set_userdata('cus_find',$customer[0]['parent_customer_id']);
				$this->session->set_flashdata('flash_message', 'updated');			
					}
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }               
            }//validation run
        }
		
		 if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('credit')=='credit')
        {
			
			$this->form_validation->set_rules('uid', 'User ID', 'required');
			if ($this->form_validation->run()) {
			$arraydata = array(
                'card_no'  => $this->input->post('uid')
			);
				$this->session->set_userdata($arraydata);
				redirect('admin/sale/add');
			}
		}

        //load the view 				
        $data['main_content'] = 'admin/credit_rec'; 
		$data['merchant_data'] = $this->sale_model->profile($mid);
        $this->load->view('includes/admin/template', $data); 
  }
  
  
  public function update(){
	  	
	 
	  //sale id 
        $id = $this->uri->segment(4);
  
        /*if save button was clicked, get the data sent via post*/
        if ($this->input->server('REQUEST_METHOD') === 'POST' && $id==$this->input->post('cid'))
        {
            /*form validation*/
             $this->form_validation->set_rules('user_id', 'User id', 'required|trim');
			$this->form_validation->set_rules('amount', 'amount', 'required');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            { 
                $data_to_store = array(
				    'user_id' => $this->input->post('user_id'),
				    'amount' => $this->input->post('amount'),
					'gst_val' => $this->input->post('gst_val'),
					'msd_val' => $this->input->post('msd_val'),
					'how_to_pay' => $this->input->post('how_to_pay'),
					'gst_amt' => $this->input->post('gst_amt'),
					'msd_amt' => $this->input->post('msd_amt'),
					'total_amount' => $this->input->post('total_amount'),
					); 
             $return = $this->Sale_model->update_sale($id, $data_to_store);

             if($return == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/sale/edit/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                

            }/*validation run*/

        }
       

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['sale'] = $this->sale_model->get_all_sale_id($id); 
        //load the view
        $data['main_content'] = 'admin/sale_update'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  
    public function sale_checkout(){
    
	$id = $this->session->userdata('user_id');
	
	$data['products'] = $this->sale_model->get_all_product($id);
	
	  if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('gtotal')!='')
        {
			
			
             $this->form_validation->set_rules('customer', 'customer', 'required|numeric');
               // $this->form_validation->set_rules('pid_array', 'product', 'required');
                $this->form_validation->set_rules('payment_type', 'payment type', 'required');
                $this->form_validation->set_rules('before_tax_amount', 'before tax amount', 'required|numeric');
                $this->form_validation->set_rules('gtotal', 'grand total', 'required|numeric');
				$this->form_validation->set_rules('auth_v', 'auth', 'required');
				$this->form_validation->set_message('required', 'please verify your Card');
				$auth = $this->input->post('auth_v');
				
				$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert"> x </a><strong>', '</strong></div>');
				if($auth != $this->session->userdata('otp_number')) {
					$this->form_validation->set_rules('auth_v', 'auth', 'required');
					$this->form_validation->set_message('required', 'please verify your Card');
				}
                
                elseif ($this->form_validation->run() == FALSE) {}
                else {
					
					$pid = $this->input->post('pid');
					$pname = $this->input->post('pname');
					$code = $this->input->post('code');
					$qty = $this->input->post('qty');
					$size = $this->input->post('size');
					$price = $this->input->post('price');
					$gst = $this->input->post('gst');
					$total_gst = $this->input->post('total_gst');
					$tprice = $this->input->post('tprice');
					$gst_percentage = $this->input->post('gst_percentage');
					$products_array = array();
					
					
					$this->session->unset_userdata('otp_number');
					$this->session->unset_userdata('auth');
					$this->session->unset_userdata('cart_contents');
					
					if(count($pid) > 0) {
						for($i=0;$i<count($pid);$i++) {
							$products_array[] = $pid[$i].'~~'.$pname[$i].'~~'.$code[$i].'~~'.$qty[$i].'~~'.$size[$i].'~~'.$price[$i].'~~'.$gst[$i].'~~'.$tprice[$i].'~~'.$gst_percentage[$i];
							$this->sale_model->update_product_qty($pid[$i],$qty[$i]);
						}
					//$products_array = array('pname'=>$pname,'qty'=>$qty,'qty_type'=>$qty_type,'qty_box'=>$qty_box,'price'=>$price);
					$products = json_encode($products_array);
					}
					$data_store = array(
					'mid' => $id,
                    'gtotal' => $this->input->post('gtotal'),
                    'products' => $products,
                    'before_tax_amount' => $this->input->post('before_tax_amount'),
                    'discount' => $this->input->post('discount'), 
                    'payment_type' => $this->input->post('payment_type'), 
                    'slip_no' => $this->input->post('slip_no'), 
                    'total_gst' => $this->input->post('total_gst'), 
                    'customer' => $this->input->post('customer')
                    
					);
                //if the insert has returned true then we show the flash message
				if($this->sale_model->store_sale($data_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/sale/sale_checkout');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
				
            }//validation run

        }
      

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
 
        //load the view
        $data['tax'] = $this->sale_model->get_all_tax();
        $data['main_content'] = 'admin/sale_checkout'; 
        $this->load->view('includes/admin/template', $data); 
	  
  }
  
    function remove($rowid) {
      // Check rowid value.
      if ($rowid==="all"){
       // Destroy data which store in session.
        $this->cart->destroy();
      } else {
     // Destroy selected rowid in session.
         $data = array(
                     'rowid' => $rowid,
                     'qty' => 0
                  );
        // Update cart data, after cancel.
      $this->cart->update($data);
	  } 
	  $this->session->set_userdata('coupon_val','');
				$this->session->set_userdata('coupon_code','');
		redirect(base_url().'admin/sale/sale_checkout');
    }
	
	  function remove_me() {
      // Check rowid value.
	  $rowid = $this->input->post('rowid');
      if ($rowid==="all"){
       // Destroy data which store in session.
        $this->cart->destroy();
      } else {
     // Destroy selected rowid in session.
         $data = array(
                     'rowid' => $rowid,
                     'qty' => 0
                  );
        // Update cart data, after cancel.
      $this->cart->update($data);
	  } 

    }
  
  
  public function del(){
  
  $id = $this->uri->segment(4); 
		 $return = $this->sale_model->delete_sale($id); 
          $this->session->set_flashdata('delete', 'true'); 
	  redirect(base_url().'admin/sale');
 }  
}
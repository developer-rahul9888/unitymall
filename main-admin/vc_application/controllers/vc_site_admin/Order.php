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

        if(!$this->session->userdata('is_admin_logged_in')){ redirect('admin'); } 
    }
	
    public function addOrderItem() {
        $orders = $this->order_model->get_all_orders();
        foreach($orders as $order) {
            $items = json_decode($order['items'],true);
            //echo '<pre>'; print_r($items);
            if(!empty($items)) {

                foreach($items as $item) {
                    $cost = $item['cost']-$item['reward'];
                    $data_to_store = array(
                        'order_id' => $order['id'],
                        'product_id' => $item['id'],
                        'product_title' => $item['name'],
                        'price' => $item['price'],
                        'reward' => $item['reward'],
                        'cost' => $cost,
                        'quantity' => $item['qty'],
                        'shipping' => $item['id'],
                        'coin' => $item['comm_dis'],
                        'total' => $cost*$item['qty'],
                    );
                    if(array_key_exists('image',$item['options'])) {
                        $data_to_store['product_image'] = $item['options']['image'];
                    }
                    $this->order_model->store_order_item($data_to_store);
                }
                
            }
            
        }
        echo '<pre>'; print_r($orders); die;
    }

  public function index() {	  
    if ($this->input->server('REQUEST_METHOD') === 'POST'){    	   
      $sdate = date('Y-m-d 00:00:01',strtotime($this->input->post('sdate')));		  
           $edate = date('Y-m-d 23:59:59',strtotime($this->input->post('edate')));   
      } else {    
              	  

          $sdate = date('Y-m-1 00:00:01');		 
              $edate = date('Y-m-t 23:59:59');    	}
    	
	$data['order'] = $this->order_model->get_all_order($sdate,$edate );
    //echo '<pre>'; print_r($data['order']); die;
	
	//load the view
      $data['main_content'] = 'admin/order_list';
      $this->load->view('includes/admin/template', $data);   
  }
  
  public function purchased_voucher() {   
    if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('submit')!='submit'){        
      $sdate = date('Y-m-d 00:00:01',strtotime($this->input->post('sdate')));     
           $edate = date('Y-m-d 23:59:59',strtotime($this->input->post('edate')));   
      } else {    
          $sdate = date('Y-m-1 00:00:01');     
          $edate = date('Y-m-t 23:59:59');     

    }
      
    if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('submit')=='submit'){
          $ids = $this->input->post('checkbox');
          //print_r($ids); die();
          $this->order_model->update_store_voucher($ids,array('status'=>$this->input->post('status')));
          $this->session->set_flashdata('flash_message', 'updated');
      }


    $data['order'] = $this->order_model->get_all_store_voucher($sdate,$edate );
  
  //load the view
      $data['main_content'] = 'admin/store_voucher_list';
      $this->load->view('includes/admin/template', $data);   
  }

  public function apiCall($data) {
        
    $type ='POST';
    $url = base_url('network-distribution');
    $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type
        ));
        if($type=='POST' && !empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

public function apiCallNew($data) {
        
    $type ='GET';
    $url = 'http://unitymall.in/distribute-order/'.$data['order_id'];
    $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type
        ));
        if($type=='POST' && !empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

   public function order_distribute(){ 
    $id = $this->uri->segment(4);
	$data['blissid'] = $return = '';
	$order = $this->order_model->get_all_order_id($id); 
	if ($this->input->server('REQUEST_METHOD') == 'POST')
        { 
            /*form validation*/
            $this->form_validation->set_rules('oid', 'order id', 'required|trim|numeric'); 
            $this->form_validation->set_rules('uid', 'user id', 'required|trim|numeric'); 
            $this->form_validation->set_rules('bid', 'bliss id', 'required|trim'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {  	 
		
                if(empty($order)){
                    $this->session->set_flashdata('flash_message', 'not_updated');
                    redirect('admin/order/distribute/'.$id.'');
                }

                elseif($order[0]['paid'] > 0) {
                    $this->session->set_flashdata('flash_message', 'already');
                    redirect('admin/order/distribute/'.$id.'');
                }

                /**************** payment distribution *******************/
                $data = [
                    'order_id'=>$order[0]['id'],
                    'cust_id' => $order[0]['user_id'],
                    'how_to_pay'=>$order[0]['how_to_pay'],
                    'comm_dis'=>$order[0]['comm_dis'],
                    'reward_point'=>$order[0]['reward'],
                ];
                $this->apiCallNew($data);
                /**************** end payment distribution *******************/

                //$this->order_model->update_order($id,['paid' => 1]);
                $this->session->set_flashdata('flash_message', 'updated');
				redirect('admin/order/distribute/'.$id.'');  			  
            

                if($return == 'TRUE'){
                    $this->session->set_flashdata('flash_message', 'updated');
					redirect('admin/order/distribute/'.$id.'');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                } 
            }/*validation run*/

        } 

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

       
        $data['order'] = $this->order_model->get_all_order_id($id); 
        $data['distribution'] = $this->order_model->get_order_distribution($id); 
        if(!empty($data['order'])) {
        $customerid = $this->order_model->get_customer_id($data['order'][0]['user_id']);
		if(!empty($customerid)) {
			$data['blissid'] = $customerid[0]['customer_id'];
		}
        }
        //load the view
        $data['main_content'] = 'admin/order_distribute'; 
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
                $data_to_store = array( 'status' => $this->input->post('status') ); 
	
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
        $data['order_item'] = $this->order_model->get_all_order_item($id); 
        $data['distribution'] = $this->order_model->get_order_distribution($id); 
        //load the view
        $data['main_content'] = 'admin/order_view'; 
        $this->load->view('includes/admin/template', $data); 
  }
  
  public function del(){
  
  $id = $this->uri->segment(4); 
		 $return = $this->order_model->delete_order($id); 
          $this->session->set_flashdata('delete', 'true'); 
	  redirect(base_url().'admin/order');
 }  
}
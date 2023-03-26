<div class="heading-area">
 <span>My Details</span>
 <ul class="navbar-right list-inline nav-page"><li><a>Home ></a></li><li><a>Profile > </a></li><li><a>Details</a></li></ul>
 </div>
  <div class="heading-area2 col-sm-12">
  <a type="submit" class="btn btn-primary" >Save Details</a> <small>* Your profile is incomplete</small><span class="navbar-right">Merchant Id: 123445</span>
  </div>
  <div class="form-area2">
  <div class="form-nav">
   <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="<?php echo base_url(); ?>admin/profile">Business Details</a></li>
                <li ><a href="<?php echo base_url(); ?>admin/commercial">Commercial Details</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>admin/bank-detail">Banks Details</a></li>
                <li><a href="<?php echo base_url(); ?>admin/other-supporting-document">Other Supporting Documents</a></li>
                <li><a href="<?php echo base_url(); ?>admin/authorized-signature">Authorized Signatory Person</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">More <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                    <li><a href="#">Commission</a></li>
                        <li><a href="#">Calculations </a></li>
                        <li><a href="#">Seller Agreement</a></li>
                         <li><a href="#">Payment Schedule</a></li>
                         <li><a href="#">Status</a></li>
                         <li><a href="#">Seller Help</a></li>
                    </ul>
                </li>
            </ul>
  
  </div>
  <div class="col-sm-12 business-details">
  <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> updated successfully.';
          echo '</div>';       
        } elseif($image_error == 'true'){
			echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Image !</strong> should not be empty please upload image.';
            echo '</div>';  
		} else{
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      } 
      
      $attributes = array('class' => 'form', 'id' => '');

      //form validation
      echo validation_errors();
	  //print_r($editor);
      
      echo form_open_multipart(base_url().'admin/bank-detail', $attributes);
	  $merchant = $bank_detail[0];
      ?>
        <div class="form-group">
            <label for="inputEmail">Beneficiary Account Holder  Name *</label>
            <input type="text" class="form-control" required name="ac_h_name"  value="<?php if($this->input->post('ac_h_name')!='') { echo $this->input->post('ac_h_name'); } else { echo $merchant['ac_h_name']; } ?>"  placeholder="Enter Beneficiary Account Holder Name">
        </div>
        <div class="form-group">
            <label for="inputPassword">Beneficiary Account No.</label>
            <input type="text" class="form-control" required name="ac_no"  value="<?php if($this->input->post('ac_no')!='') { echo $this->input->post('ac_no'); } else { echo $merchant['ac_no']; } ?>"  placeholder="Enter Beneficiary Account Number">
        </div>
        <div class="form-group">
            <label for="inputPassword">Bank Name *</label>
			<input type="text" class="form-control" required name="b_name"  value="<?php if($this->input->post('b_name')!='') { echo $this->input->post('b_name'); } else { echo $merchant['b_name']; } ?>" placeholder="Enter Bank Name">
 
        </div> 
		
        <div class="form-group">
            <label for="inputPassword">City *</label>
            <input type="text" class="form-control" required name="city"  value="<?php if($this->input->post('city')!='') { echo $this->input->post('city'); } else { echo $merchant['city']; } ?>"  placeholder="Enter City">
        </div>
        <div class="form-group">
            <label for="inputPassword">Branch Details *</label>
            <input type="text" class="form-control" required name="br_detail"  value="<?php if($this->input->post('br_detail')!='') { echo $this->input->post('br_detail'); } else { echo $merchant['br_detail']; } ?>"  placeholder="Enter Branch Details">
        </div> 
        <div class="form-group">
            <label for="inputPassword">IFSC Code *</label>
            <input type="text" class="form-control"  required name="ifce_code"  value="<?php if($this->input->post('ifce_code')!='') { echo $this->input->post('ifce_code'); } else { echo $merchant['ifce_code']; } ?>"  placeholder="Enter IFCE Code">
        </div> 
        <div class="form-group">
            <label for="inputPassword">MICR Code*</label>
            <input type="text" class="form-control" required name="mirc_code"  value="<?php if($this->input->post('mirc_code')!='') { echo $this->input->post('mirc_code'); } else { echo $merchant['mirc_code']; } ?>"  placeholder="Enter MICR Code">
        </div> 
		
		
		  <div class="form-group">
            <label for="inputPassword">GST Number*</label>
            <input type="text" class="form-control" required name="gst"  value="<?php if($this->input->post('gst')!='') { echo $this->input->post('gst'); } else { echo $merchant['gst']; } ?>"  placeholder="Enter GST Number">
        </div> 
		
		
         <input type="hidden" name="merchant_id"  value="<?php echo $this->session->userdata('user_id');?>"  placeholder="Enter MICR Code">
		 <div class="form-group form-group-0">
        <button type="submit" class="btn btn-primary">Save Details</button>
		<br><small>Note: Fields marked as* are mandatory fields</small>
		</div>
     <?php echo form_close(); ?>
  </div>
 <!-- heading-area close-->
 </div>
 <!-- main body -->
 </div>
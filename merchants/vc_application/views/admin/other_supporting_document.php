<div class="heading-area">
 <span>My Details</span>
 <ul class="navbar-right list-inline nav-page"><li><a>Home ></a></li><li><a>Profile > </a></li><li><a>Other Supporting Documents</a></li></ul>
 </div>
  <div class="heading-area2 col-sm-12">
  <!--a type="submit" class="btn btn-primary" >Save Details</a--> 
  <small>* Your profile is incomplete</small>
  <span class="navbar-right">Merchant Id: 123445</span>
  </div>
  <div class="form-area2">
  <div class="form-nav">
   <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li ><a href="<?php echo base_url(); ?>admin/profile">Business Details</a></li>
                <li ><a href="<?php echo base_url(); ?>admin/commercial">Commercial Details</a></li>
                <li ><a href="<?php echo base_url(); ?>admin/bank-detail">Banks Details</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>admin/other-supporting-document">Other Supporting Documents</a></li>
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
        } elseif($this->session->flashdata('flash_message') == 'Cancelled Cheque'){
			echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Cancelled Cheque !</strong> should not be empty please upload.';
            echo '</div>';  
		 } elseif($this->session->flashdata('flash_message') == 'Address Proof'){
			echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Address  Proof !</strong> should not be empty please upload.';
            echo '</div>';  
		} else {
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
      
      echo form_open_multipart(base_url().'admin/other-supporting-document', $attributes);
	  
	  $merchant = $supporting_docs[0];
      ?>
         
		
         
        <div class="form-group">
            <label for="inputPassword">Board Resolution for Authorized Signatory</label>
            <input type="file" name="brfa_sign"  >
			<input type="hidden" value="<?php echo $merchant['brfa_sign']; ?>" name="brfa_sign_exist">
<?php if($merchant['brfa_sign'] !='') { echo '<a target="_blank" href="'.base_url().'images/merchantdocs/'.$merchant['brfa_sign'].'">Download</a>'; } ?>
        </div> 
        <div class="form-group">
            <label for="inputPassword">Company Inc Certificate</label>
            <input type="file" name="ci_crt"  >
			<input type="hidden" value="<?php echo $merchant['ci_crt']; ?>" name="ci_crt_exist">
<?php if($merchant['ci_crt'] !='') { echo '<a target="_blank" href="'.base_url().'images/merchantdocs/'.$merchant['ci_crt'].'">Download</a>'; } ?>
        </div> 
        <div class="form-group">
            <label for="inputPassword">Address  Proof *</label>
            <input type="file" name="a_prf"   >
			<input type="hidden" value="<?php echo $merchant['a_prf']; ?>" name="a_prf_exist">
<?php if($merchant['a_prf'] !='') { echo '<a target="_blank" href="'.base_url().'images/merchantdocs/'.$merchant['a_prf'].'">Download</a>'; } ?>
        </div> 
        <div class="form-group">
            <label for="inputPassword">Cancelled Cheque *</label>
            <input type="file" name="can_chq">
			<input type="hidden" value="<?php echo $merchant['can_chq']; ?>" name="can_chq_exist">
<?php if($merchant['can_chq'] !='') { echo '<a target="_blank" href="'.base_url().'images/merchantdocs/'.$merchant['can_chq'].'">Download</a>'; } ?>
        </div> 
		<input type="hidden" name="merchant_id"  value="<?php echo $this->session->userdata('user_id');?>">  
         
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
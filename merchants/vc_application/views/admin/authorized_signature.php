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
                <li ><a href="<?php echo base_url(); ?>admin/bank-detail">Banks Details</a></li>
                <li ><a href="<?php echo base_url(); ?>admin/other-supporting-document">Other Supporting Documents</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>admin/authorized-signature">Authorized Signatory Person</a></li>
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
      
      echo form_open_multipart(base_url().'admin/authorized-signature', $attributes);
	  
	  $merchant = $authorised_signature[0];
      ?>
        <div class="form-group">
            <label for="inputEmail">Authorized Signatory  Name *</label>
            <input type="text" class="form-control" required name="as_si_name"  value="<?php if($this->input->post('as_si_name')!='') { echo $this->input->post('as_si_name'); } else { echo $merchant['as_si_name']; } ?>"  placeholder="Enter Authorized Signatory  Name">
        </div>
        <div class="form-group">
            <label for="inputPassword">Authorized Signatory Designation *</label>
            <input type="text" class="form-control" required name="as_si_desi"  value="<?php if($this->input->post('as_si_desi')!='') { echo $this->input->post('as_si_desi'); } else { echo $merchant['as_si_desi']; } ?>"  placeholder="Enter Authorized Signatory Designation">
        </div>
        <div class="form-group">
            <label for="inputPassword">Authorized Signatory Email *</label>
			<input type="email" class="form-control" required name="as_si_email"  value="<?php if($this->input->post('as_si_email')!='') { echo $this->input->post('as_si_email'); } else { echo $merchant['as_si_email']; } ?>" placeholder="Authorized Signatory Email">
 
        </div> 
		
        <div class="form-group">
            <label for="inputPassword">Authorized Signatory Mobile *</label>
            <input type="tel" class="form-control" required name="as_si_mob" onkeyup="if(/\D/g.test(this.value))this.value=this.value.replace(/\D/g,'')" value="<?php if($this->input->post('as_si_mob')!='') { echo $this->input->post('as_si_mob'); } else { echo $merchant['as_si_mob']; } ?>"  placeholder="Enter Authorized Signatory Mobile">
        </div> 
		<div class="form-group">
            <label for="inputPassword">Authorized Signatory Scanned Copy With Stamp *</label>
            <input type="file" name="ci_crt"  >
			<input type="hidden" value="<?php echo $merchant['ci_crt']; ?>" name="avtar_exist">
<?php if($merchant['ci_crt'] !='') { echo '<a href="'.base_url().'images/merchantdocs/'.$merchant['ci_crt'].'">Download</a>'; } ?>
        </div> 
         <input type="hidden" name="merchant_id"  value="<?php echo $this->session->userdata('user_id');?>">
		 <div class="form-group form-group-0">
        <button type="submit" class="btn btn-primary">Save Details</button>
		<br><small>Note: Fields marked as* are mandatory fields</small>
		</div>
    </form>
  </div>
 <!-- heading-area close-->
 </div>
 <!-- main body -->
 </div>
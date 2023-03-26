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
                <li class="active"><a href="<?php echo base_url(); ?>admin/commercial">Commercial Details</a></li>
                <li ><a href="<?php echo base_url(); ?>admin/bank-detail">Banks Details</a></li>
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
      
      echo form_open_multipart(base_url().'admin/commercial', $attributes);
	  
	  $merchant = $commerc_detail[0];
      ?>
   
        <div class="form-group">
            <label for="inputEmail">Registered Legal Entity Name *</label>
            <input type="text" class="form-control" required name="r_l_e_name"  value="<?php if($this->input->post('r_l_e_name')!='') { echo $this->input->post('r_l_e_name'); } else { echo $merchant['r_l_e_name']; } ?>" placeholder="Enter Legal Entity Name">
        </div>
        <div class="form-group">
            <label for="inputPassword">Excise Registration No.</label>
            <input type="text" class="form-control" name="e_reg_no"  value="<?php if($this->input->post('e_reg_no')!='') { echo $this->input->post('e_reg_no'); } else { echo $merchant['e_reg_no']; } ?>"  placeholder="Enter Registration Number">
        </div>
        <div class="form-group">
            <label for="inputPassword">Service Tax No.</label>
			<input type="text" class="form-control" name="s_tax_no"  value="<?php if($this->input->post('s_tax_no')!='') { echo $this->input->post('s_tax_no'); } else { echo $merchant['s_tax_no']; } ?>" placeholder="Enter Service Tax Number">
 
        </div>
        <div class="form-group">
             <div class="checkbox">
    <label><input type="checkbox" name="s_e_goods" value="true">  Selling Exempted Goods</label>
  </div>
 
        </div>
		
        <div class="form-group">
            <label for="inputPassword">PAN No *</label>
            <input type="text" class="form-control" required name="pan_no"  value="<?php if($this->input->post('pan_no')!='') { echo $this->input->post('pan_no'); } else { echo $merchant['pan_no']; } ?>"  placeholder="Enter PAN Number">
        </div>
        <div class="form-group">
            <label for="inputPassword">PAN Card Proof *</label>
            <input type="file" name="pan_proof">
			<input type="hidden" value="<?php echo $merchant['pan_proof']; ?>" name="avtar_exist">
<?php if($merchant['pan_proof'] !='') { echo '<a href="'.base_url().'images/merchantdocs/'.$merchant['pan_proof'].'">Download</a>'; } ?>

        </div>
        <div class="form-group">
            <label for="inputPassword">TAN</label>
            <input type="text" class="form-control" name="tan"  value="<?php if($this->input->post('tan')!='') { echo $this->input->post('tan'); } else { echo $merchant['tan']; } ?>"  placeholder="Enter TAN">
        </div>
        <div class="form-group">
            <label for="inputPassword">TAN Proof</label>
            <input type="file" name="t_proof" >
		<input type="hidden" value="<?php echo $merchant['t_proof']; ?>" name="avtar_exist">
<?php if($merchant['t_proof'] !='') { echo '<a href="'.base_url().'images/merchantdocs/'.$merchant['t_proof'].'">Download</a>'; } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword">GST No *</label>
            <input type="text" class="form-control" required name="vt_no"  value="<?php if($this->input->post('vt_no')!='') { echo $this->input->post('vt_no'); } else { echo $merchant['vt_no']; } ?>"  placeholder="Enter VAT TIN Number">
        </div>
		
        <!--div class="form-group">
            <label for="inputPassword">VAT TIN  Proof *</label>
            <input type="file" name="vt_proof">
			<input type="hidden" value="<?php echo $merchant['vt_proof']; ?>" name="avtar_exist">
<?php if($merchant['vt_proof'] !='') { echo '<a href="'.base_url().'images/merchantdocs/'.$merchant['vt_proof'].'">Download</a>'; } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword">Central Sales Tax No*</label>
            <input type="text" class="form-control" name="cst_no" required value="<?php if($this->input->post('cst_no')!='') { echo $this->input->post('cst_no'); } else { echo $merchant['cst_no']; } ?>"  placeholder="Enter Central Sales Tax Number">
        </div>
        <div class="form-group">
            <label for="inputPassword">CST  Proof *</label>
            <input type="file" name="cst_proof">
		<input type="hidden" value="<?php echo $merchant['cst_proof']; ?>" name="avtar_exist">
<?php if($merchant['cst_proof'] !='') { echo '<a href="'.base_url().'images/merchantdocs/'.$merchant['cst_proof'].'">Download</a>'; } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword">VAT Registration Date</label>
			
			<div class="input-group date" id="datetimepicker">
  <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
  <input type="text" class="form-control"  name="vrg_date"  value="<?php if($this->input->post('vrg_date')!='') { echo $this->input->post('vrg_date'); } else { echo $merchant['vrg_date']; } ?>" placeholder="Enter VAT Registration Date YY-MM-DD">
 
</div>
        </div>
        <div class="form-group">
            <label for="inputPassword">Central Sales Tax Registration Date</label>
            
			<div class="input-group" id="datetimepicker1">
  <span class="input-group-addon glyphicon glyphicon-calendar"> </span>
  <input type="text" class="form-control" name="cst_rg_dt"  value="<?php if($this->input->post('cst_rg_dt')!='') { echo $this->input->post('cst_rg_dt'); } else { echo $merchant['cst_rg_dt']; } ?>" placeholder="Enter CST Registration Date YY-MM-DD">
 
</div>
        </div-->
		
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
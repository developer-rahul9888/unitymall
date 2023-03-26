	
     <style>
	 label.checkbox { padding-left: 20px;}
	 .add-more-d-area-div-parent input {margin-bottom: 6px;}
	 label.checkbox{font-weight:normal;}
	 </style>
      <div class="page-heading"><a class="btn btn-primary flr" href="<?php echo base_url().'admin/company'; ?>">Back</a>
        <h2>Update Company</h2>
      </div>
 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> company updated successfully.';
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
	  //print_r($restaurants);
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form', 'id' => '');

      //form validation
      echo validation_errors();
	  //print_r($editor);
       if($this->session->userdata('permission')=='3' || $this->session->userdata('permission')=='4') { 
	    
	  
      echo form_open_multipart('/admin/company/edit/'.$this->uri->segment(4).'', $attributes);
	  $memb = $company[0];
      ?>
        <fieldset>
		<input type="hidden" value="<?php echo $memb['waoic']; ?>" name="cid">
		
      <div class="form-group col-sm-6">
            <label>Name</label>
              <input required="" type="text" name="name" value="<?php if($this->input->post('name')!='') { echo $this->input->post('name'); }  else { echo $memb['name']; }?>" class="form-control">
          </div>
			<div class="form-group col-sm-6">
            <label>Corporate Family</label>
              <input type="text" class="form-control" name="corporate_family" value="<?php if($this->input->post('corporate_family')!='') { echo $this->input->post('corporate_family'); }else { echo $memb['corporate_family']; } ?>" >
          </div>
		<div class="form-group col-sm-6">
            <label>WAOIC</label>
              <input type="text" class="form-control" name="waoic" value="<?php if($this->input->post('waoic')!='') { echo $this->input->post('waoic'); }  else { echo $memb['waoic']; }?>">
          </div>
          
		  <div class="form-group col-sm-6">
            <label>NAIC</label>
             <input type="text" class="form-control"  name="npn" value="<?php if($this->input->post('naic')!='') { echo $this->input->post('naic'); }  else { echo $memb['naic']; } ?>" >
          </div> 
		  
          <div class="form-group col-sm-6">
            <label>Address</label>
             <input type="text" class="form-control"  name="r_address" value="<?php if($this->input->post('r_address')!='') { echo $this->input->post('r_address'); }  else { echo $memb['r_address']; } ?>" >
          </div> 
		  <div class="form-group col-sm-6">
            <label>City, State, Zip</label>
             <input type="text" class="form-control"  name="m_address" value="<?php if($this->input->post('m_address')!='') { echo $this->input->post('m_address'); }  else { echo $memb['m_address']; } ?>" >
          </div> 
		  
		  <div class="form-group col-sm-6">
            <label>Phone</label>
             <input type="text" class="form-control"  name="phone" value="<?php if($this->input->post('phone')!='') { echo $this->input->post('phone'); }  else { echo $memb['phone']; } ?>" >
          </div> 
			
			<div class="form-group col-sm-6">
            <label>Date</label>
             <input type="text" class="form-control"  name="a_date" value="<?php if($this->input->post('a_date')!='') { echo $this->input->post('a_date'); }else { echo $memb['a_date']; }  ?>" >
          </div> 
		  
		  <div class="form-group col-sm-6">
            <label>Insurance Type</label>
             <input type="text" class="form-control"  name="insurance_types" value="<?php if($this->input->post('insurance_types')!='') { echo $this->input->post('insurance_types'); } else { echo $memb['insurance_types']; } ?>" >
          </div> 
		  
		  <div class="form-group col-sm-6">
            <label>Organization Type</label>
             <input type="text" class="form-control"  name="organization_type" value="<?php if($this->input->post('organization_type')!='') { echo $this->input->post('organization_type'); } else { echo $memb['organization_type']; } ?>" >
          </div> 
		  
		  <div class="form-group col-lg-6 col-mg-6 col-sm-6">
            <label>Status</label>
              <select class="form-control" name="status">
			    <option <?php if($memb['status']=='ACTIVE') { echo 'selected="selected"'; } ?> value="ACTIVE">ACTIVE</option>
				<option <?php if($memb['status']=='INACTIVE') { echo 'selected="selected"'; } ?> value="INACTIVE">INACTIVE</option>
			 </select>
          </div>

		  
          <div class="form-group  col-lg-12">
            <button class="btn btn-primary" type="submit">Updates</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin/company'; ?>">Cancel </a>
          </div>
        </fieldset>
      <?php echo form_close(); ?>
	   <?php } else { echo '<p>You have no permission to edit any company. Please contact to administrator.</p>'; } ?>
	   
<!--link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  jQuery(document).ready( function() {
    jQuery( ".datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
    
    var availableTags = ["<?php /* $data_all_codenate_name = array();
	  foreach($codenate_name as $val){
		  $data_all_codenate_name[] = $val['first_name']; 
	  }
 echo implode('","',$data_all_codenate_name); */
?>"];
    jQuery( "#coordinator" ).autocomplete({
      source: availableTags
    });
  } );
  </script-->
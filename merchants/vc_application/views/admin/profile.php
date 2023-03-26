 <?php
 $merchant = $merchant_meta[0];
 $merchant_info = $merchant_data[0];
 ?>
 <div class="heading-area">
 <span>My Details</span>
 <ul class="navbar-right list-inline nav-page"><li><a>Home ></a></li><li><a>Profile > </a></li><li><a>Details</a></li></ul>
 </div>
  <div class="heading-area2 col-sm-12">
  <!--a type="submit" class="btn btn-primary" >Save Details</a--> 
  <?php if($merchant['brands']=='') { ?><small>* Your profile is incomplete</small><?php } ?>
  <span class="navbar-right">Merchant Id: <b><?php echo $merchant_info['merchant_id'];?></b></span>
  </div>
  <div class="form-area2">
  <div class="form-nav">
   <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url(); ?>admin/profile">Business Details</a></li>
				<?php if($merchant_info['access']==1){?>
                <li ><a href="<?php echo base_url(); ?>admin/commercial">Commercial Details</a></li>
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
                         <li><a href="#">Seller Help</a></li>
                    </ul>
                </li>
				
				<?php } ?>
				
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
      
      echo form_open_multipart(base_url().'admin/profile', $attributes);
	   
      ?>
	  
        <div class="form-group">
            <label for="inputEmail">User</label>
            <input readonly type="text" class="form-control" value="<?php echo $merchant_info['email'];?>" name="email" id="inputEmail">
        </div>
        <div class="form-group">
            <label>Display Name *</label>
            <input type="text" value="<?php echo $merchant_info['d_name'];?>" class="form-control" required name="d_name" placeholder="Enter Display Name">
        </div>
		
		
		
		
		<div class="form-group">
            <label  class="control-label">Business Details</label>
               <textarea class="form-control textarea-editor" name="b_details"><?php if($this->input->post('b_details')!='') { echo $this->input->post('b_details'); }else { echo $merchant['b_details']; } ?></textarea>
          </div>
		  
		
		
		
        <div class="form-group hide">
            <label>Brands *</label>
            <input type="text" name="brands" value="brands" class="form-control" placeholder="Enter Brands Name in which you are trading">
        </div>
		
		
		
		<div class="form-group ">
           <label >Status</label>
             <select name="status" class="form-control custom-select">
			  <option value="active">Active</option>
			  <option <?php if($merchant_info['status']=='deactive') { echo 'selected="selected"'; } ?> value="deactive">Deactive</option>
			  </select>
          
          </div> 
		
        <div class="form-group">
            <label>Store Image</label>
<input type="hidden" name="avtar_exist" value="<?php echo $merchant['brand_proof'];?>">
            <input type="file" name="brand_proof" >
			<?php if($merchant['brand_proof'] !='') { echo '<a target="_blank" href="'.base_url().'images/profile/business_details/'.$merchant['brand_proof'].'"><img src="'.base_url().'images/profile/business_details/'.$merchant['brand_proof'].'" width="100" height="80"></a>'; } ?>
        </div>
		<div class="form-group">
            <label>Category *</label><br>
			 <?php if(!empty($category)) {
				 $category_ids = explode(',',$merchant['business_type']);
				  foreach($category as $value) {
					  echo '<label style="font-weight:normal"> <input type="checkbox"  name="business_type[]" value="'.$value['id'].'"';
					  if(in_array($value['id'],$category_ids)) { echo ' checked="checked" '; }
					  echo '> '.$value['c_name'].'</label> &nbsp;&nbsp;';
				  }
			  } ?>
             
        </div>
		
		<div class="form-group">
            <label>Trending services</label><br>
			 <?php if(!empty($tren_category)) {
				
				  foreach($tren_category as $values) {
					  
					   $trending_ids = explode(',',$merchant['business_type']);
					  echo '<label style="font-weight:normal"> <input type="checkbox"  name="business_type[]" value="'.$values['id'].'"';
					  if(in_array($values['id'],$trending_ids)) { echo ' checked="checked" '; }
					  echo '> '.$values['c_name'].'</label> &nbsp;&nbsp;';
				  }
			  } ?>
             
        </div>
		
		<div class="panel panel-default">
       
		<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Registered Address <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div>
	   
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		  
		  <div class="form-group">
            <label>Address Street 1 *</label>
            <input type="text" name="address_s_1" value="<?php echo $merchant['address_s_1'];?>" class="form-control" placeholder="Enter address Line 1 Here ">
        </div>
		  <div class="form-group">
            <label>Address Street 2</label>
            <input type="text" name="address_s_2" value="<?php echo $merchant['address_s_2'];?>" class="form-control" placeholder="Enter address Line 2 Here ">
        </div>
		
		 <div class="form-group">
            <label>Sector</label>
            <input type="text" name="sector" value="<?php echo $merchant['sector'];?>" class="form-control" placeholder="Enter address Line 2 Here ">
        </div>
		
		  <div class="form-group">
            <label>City *</label>
            <input type="text" name="city" value="<?php echo $merchant['city'];?>" class="form-control" placeholder="Enter City Here ">
        </div>
		  <div class="form-group">
            <label>State *</label>
            <input type="text" name="state" value="<?php echo $merchant['state'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Pin Code*</label>
            <input type="text" name="zip" value="<?php echo $merchant['zip'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Country *</label>
            <input type="text" name="country" value="<?php echo $merchant['country'];?>" class="form-control" placeholder="India">
        </div>
		  
		  </div>
    </div>
        </div>
		
	<?php if($merchant_info['access']==1){?>	
		<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pickup Address <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
         <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		
		<div class="form-group">
             <div class="checkbox">
    <label><input type="checkbox" name="pickup_checkbox" value="yes" <?php if($merchant['pickup_checkbox']=='yes') { echo 'checked="checked"'; } ?>> Same as registered address</label>
  </div>
        </div>
		
   <div class="form-group">
            <label>Address Street 1 *</label>
            <input type="text" name="p_address_s_1" value="<?php echo $merchant['p_address_s_1'];?>" class="form-control" placeholder="Enter address Line 1 Here ">
        </div>
		  <div class="form-group">
            <label>Address Street 2 </label>
            <input type="text" name="p_address_s_2" value="<?php echo $merchant['p_address_s_2'];?>" class="form-control" placeholder="Enter address Line 2 Here ">
        </div>
		  <div class="form-group">
            <label>City *</label>
            <input type="text" name="p_city" value="<?php echo $merchant['p_city'];?>" class="form-control" placeholder="Enter City Here ">
        </div>
		  <div class="form-group">
            <label>State *</label>
            <input type="text" name="p_state" value="<?php echo $merchant['p_state'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Pin Code*</label>
            <input type="text" name="p_zip" value="<?php echo $merchant['p_zip'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Country *</label>
            <input type="text" name="p_country" value="<?php echo $merchant['p_country'];?>" class="form-control" placeholder="India">
        </div>
		  
        </div>
        </div>
        </div>
		<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Return Address<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div>
	   
         <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		
		<div class="form-group">
             <div class="checkbox">
    <label><input type="checkbox" name="return_checkbox" value="yes" <?php if($merchant['return_checkbox']=='yes') { echo 'checked="checked"'; } ?>> Same as registered address</label>
  </div>
        </div>
		
   <div class="form-group">
            <label>Address Street 1 *</label>
            <input type="text" name="r_address_s_1" value="<?php echo $merchant['r_address_s_1'];?>" class="form-control" placeholder="Enter address Line 1 Here ">
        </div>
		  <div class="form-group">
            <label>Address Street 2</label>
            <input type="text" name="r_address_s_2" value="<?php echo $merchant['r_address_s_2'];?>" class="form-control" placeholder="Enter address Line 2 Here ">
        </div>
		  <div class="form-group">
            <label>City *</label>
            <input type="text" name="r_city" value="<?php echo $merchant['r_city'];?>" class="form-control" placeholder="Enter City Here ">
        </div>
		  <div class="form-group">
            <label>State *</label>
            <input type="text" name="r_state" value="<?php echo $merchant['r_state'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Pin Code*</label>
            <input type="text" name="r_zip" value="<?php echo $merchant['r_zip'];?>" class="form-control" placeholder="">
        </div>
		  <div class="form-group">
            <label>Country *</label>
            <input type="text" name="r_country" value="<?php echo $merchant['address_s_1'];?>" class="form-control" placeholder="India">
        </div>
		  
        </div>
        </div>
        </div>
         
      <div class="panel panel-default">
		<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Operations Contact Person <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"> 
		  <div class="form-group">
            <label>Name *</label>
            <input type="text" name="o_name" value="<?php echo $merchant['o_name'];?>" class="form-control" placeholder="Enter  Name">
        </div> 
		  <div class="form-group">
            <label>Email *</label>
            <input type="email" name="o_email" value="<?php echo $merchant['o_email'];?>" class="form-control" placeholder="Enter Name">
        </div> 
		  <div class="form-group">
            <label>Designation *</label>
            <input type="text" name="o_designation" value="<?php echo $merchant['o_designation'];?>" class="form-control" placeholder="Enter Designation">
        </div>
		  <div class="form-group">
            <label>Contact No *</label>
            <input type="text" name="o_phone" value="<?php echo $merchant['o_phone'];?>" class="form-control" placeholder="Enter Contact No">
        </div> 
		  
        </div>
        </div>
        </div>

	<?php } ?>

		<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">images / video <span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
         <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
		
		 <div class="form-group col-lg-6 col-mg-6 col-sm-6">
        <label  class="control-label col-sm-5">Image <br>
		<input type="file" class="form-control" name="image" >
		<input type="hidden" value="<?php echo $merchant['brand_proof'];?>" name="image_old">
		</label>
               <div class="col-sm-7"><?php if($merchant['brand_proof']!='') { echo '<img width="150" class="img-responsive" src="'.base_url().'images/profile/business_details/'.$merchant['brand_proof'].'" >'; } ?> </div>
			    
		  <div class="form-group col-sm-12"> 
         <?php if($merchant['images']!=''){
				$imagesArray = json_decode($merchant['images'],true);
				$count = 1; /*echo '<pre>';print_r($imagesArray);echo '</pre>';*/
				foreach($imagesArray as $imagesVal) {
					echo '<div class="remove-i-div-'.$count.'"><div class="form-group col-sm-3"><input type="hidden" value="'.$imagesVal.'" name="images_old[]"><img class="img-responsive" src="'.base_url().'images/profile/business_details/'.$imagesVal.'" ><button data-img="'.$imagesVal.'" data=".remove-i-div-'.$count.'" type="button" class="remove-btn glyphicon glyphicon-remove remove-image-div"></button></div></div>';
					$count++;
				}
			} ?>	
			<div class="clearfix"></div>
			
<p class="clr"> <button class="btn btn-success btn-sm add-upload-img" type="button">Add Image</button><br> </p> 			
			<div class="add-upload-img-div"></div> 
		  </div>
		  
          </div>
		  
		  <div class="form-group col-lg-6 col-mg-6 col-sm-6">
        <label  class="control-label col-sm-3">Video url</label>
               <div class="col-sm-9"> <input type="text" name="video" value="<?php echo $merchant['video'];?>" class="form-control" placeholder="Enter Video url"></div>
			</div>
		  
		 
		
  
        </div>
        </div>
		
		
        </div> 
		
		 
		
       <div class="form-group form-group-0">
        <button type="submit" class="btn btn-primary">Save Details</button>
		<br><small>Note: Fields marked as * are mandatory fields</small>
		</div>
    <?php echo form_close(); ?>
  </div>
 <!-- heading-area close-->
 </div>
 <!-- main body -->
 </div>
 
 <script>
	  jQuery(document).ready(function(){
		var imgid = 999;
		 jQuery('.add-upload-img').click(function(){
            var add_attr = '<div class="remove-img-div-'+imgid+'"><div class="form-group col-sm-11"><input type="file" required class="form-control" name="p_image[]" value="" ></div><div class="col-sm-1"><button data=".remove-img-div-'+imgid+'" type="button" class="glyphicon glyphicon-remove remove-btn  remove-img-div"></button></div></div>';
			jQuery('.add-upload-img-div').append(add_attr);
			imgid++;
		 });
		 
        jQuery('html').on('click','.remove-img-div',function(){
		  if(confirm('Are you sure ?')) { 
           var cls = jQuery(this).attr('data');
		   jQuery(cls).html();
		   jQuery(cls).remove();
		 }
		});	 
	  
	  });
	  </script>

 <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.textarea-editor',browser_spellcheck: true, height:350 });</script>


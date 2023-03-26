	
     <style>
	 label.checkbox { padding-left: 20px;}
	 .add-more-d-area-div-parent input {margin-bottom: 6px;}
	 label.checkbox{font-weight:normal;}
	 .iod ul{float:right}
	 .iods ul{float:right}
	 .iods{background:#ccc}
	 .remove-btn{color: #ff0000;padding: 3px 10px;	 font-size: 21px;}
	 input[type="file"]{padding:0px;}
	 
	 </style>
	 <?php 
	 //form data
      $attributes = array('class' => 'form', 'id' => '');
      echo form_open_multipart(base_url().'admin/credit/add', $attributes);
	  ?>
<div class="page-heading"> <a href="<?php echo base_url();?>admin" class="btn flr btn-primary btn-sm">Back</a>
        <h2 class="iod">Customer Info</h2> 
      </div>
 
      <?php 
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Customer Find successfully.';
          echo '</div>';       
        }elseif($this->session->flashdata('flash_message') == 'received')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> Payment recived successfully.';
          echo '</div>';       
        }elseif($this->session->flashdata('flash_message') == 'not_active')
        {
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Not Eligible!</strong> Customer Not Active Yet.';
          echo '</div>';       
        }
		else{
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> no user found.';
          echo '</div>';          
        }
      }
	   
      ?>
       
      <?php 
      //form validation
      echo validation_errors(); 
      ?>
	  
        <fieldset> 
		

		<div class="form-group col-sm-6">  
        <label  class="control-label col-sm-5">Card No. <small style="color:red">*</small></label>
		<div class="col-sm-7"> 
		<input type="text" class="form-control" required name="uid" value="<?php if($this->input->post('uid')!='') { echo $this->input->post('uid'); }  ?>" >
		</div>  
		</div> 
	
		<div class="col-lg-6 col-md-6">
          <div class="form-group">
            <button class="btn btn-primary" name="find" value="Find" type="submit">Find</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin'; ?>">Cancel </a>
			 <?php if($this->session->flashdata('flash_message') == 'updated') { ?>
			 <button class="btn btn-primary" name="credit" value="credit" type="submit">Add sale</button>
			 <?php  } ?>
          </div>
		 </div>
        </fieldset> 
		
		<?php if(empty($userdata)) { ?><?php } else {  $user=$userdata[0]; ?>
	  
	  
	 
		
		<fieldset> 
		<div class="form-group col-sm-4">  
        <label  class="control-label col-sm-6">User Name <small style="color:red">*</small></label>
		<div class="col-sm-6"> 
		<input type="text" class="form-control" Disabled value="<?php echo $user['f_name']; ?>" >
		</div>  
		</div> 
		
		<div class="form-group col-sm-4">  
        <label  class="control-label col-sm-6">Number <small style="color:red">*</small></label>
		<div class="col-sm-6"> 
		<input type="text" class="form-control" Disabled  value="<?php echo $user['phone']; ?>" >
		</div>  
		</div> 
		
		
		<div class="form-group col-sm-4">  
        <label  class="control-label col-sm-6">Image <small style="color:red">*</small></label>
		<div class="col-sm-6"> 
		<img src="http://www.wishzon.com/images/user/<?php echo $user['image']; ?>" >
		</div>  
		</div> 
		
		
	
		</div>  
		</div> 	
		  
		
        </fieldset>
		
		
		
		<?php } ?>
		
      <?php echo form_close(); ?>
	  
	
	  
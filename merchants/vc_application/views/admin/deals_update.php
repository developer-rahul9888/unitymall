	
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
      echo form_open_multipart(base_url().'admin/deals/edit/'.$this->uri->segment(4).'', $attributes);
	  $prod = $deals[0];
	  ?>
      <div class="page-heading"> 
        <h2 class="iod">Edit Deals</h2> 
      </div>
 
      <?php 
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> product updated successfully.';
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
	   
      ?>
      
      <?php 
      echo validation_errors(); 
	  if($prod['mid']==$this->session->userdata('user_id')) { 
      ?>
        <fieldset> 
		
		<div class="col-sm-12">	  
		 
		 <input type="hidden" class="form-control" required name="cid" value="<?php echo $prod['id'];  ?>" >
		 <input type="hidden" class="form-control" required name="mid" value="<?php echo $prod['mid'];  ?>" >
	  
		<div class="form-group col-sm-12">
          <label  class="control-label col-sm-3">Title <small style="color:red">*</small></label>
             <div class="col-sm-9"> <input type="text" class="form-control" required name="title" value="<?php if($this->input->post('title')!='') { echo $this->input->post('title'); } else { echo $prod['title']; }  ?>" >
          </div>
          </div>
		
		<div class="form-group col-sm-12">
             <label  class="control-label col-sm-3">Description</label>
           <div class="col-sm-9">   <textarea class="form-control" required name="description"><?php if($this->input->post('description')!='') { echo $this->input->post('description'); } else { echo $prod['description']; }  ?></textarea>
          </div>
          </div>
		  
		  <div class="form-group col-sm-12">
             <label  class="control-label col-sm-3">Terms and condition</label>
           <div class="col-sm-9">   <textarea class="form-control" required name="terms"><?php if($this->input->post('terms')!='') { echo $this->input->post('terms'); } else { echo $prod['terms']; } ?></textarea>
          </div>
          </div>
		  
		  <div class="form-group col-sm-12">
           <label  class="control-label col-sm-3">Status <small style="color:red">*</small></label>
             <div class="col-sm-9">  <select name="status" class="form-control custom-select">
			  <option value="Active">Active</option>
			  <option <?php if($prod['status']=='Deactive') { echo 'selected="selected"'; } ?> value="Deactive">Deactive</option>
			  </select>
          </div> 
          </div> 
    
  <div class="form-group col-sm-12">
        <label  class="control-label col-sm-3">Image <br>
		<input type="hidden" value="<?php echo $prod['image'];?>" name="image_old">
		</label>
               <div class="col-sm-9">
		<input type="file" class="form-control" name="image" > 
				   <?php if($prod['image']!='') { echo '<img width="90" class="img-responsive" src="'.base_url().'images/deals/'.$prod['image'].'" >'; } ?> </div>
	</div>
	
	</div>
				  <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin/deals'; ?>">Cancel </a>
          </div>
		  </div>
        </fieldset>
<?php } else { echo '<p>Please check the url.</p>'; } ?>
      <?php echo form_close(); ?>
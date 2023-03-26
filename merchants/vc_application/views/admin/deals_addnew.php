	
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
      echo form_open_multipart(base_url().'admin/deals/add', $attributes);
	  ?>
<div class="page-heading"> <a href="<?php echo base_url();?>admin/product" class="btn flr btn-primary btn-sm">Back</a>
        <h2 class="iod">Add Deals</h2> 
      </div>
 
      <?php 
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> deals added successfully.';
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
      //form validation
      echo validation_errors(); 
      ?>
        <fieldset> 
		<div class="form-group col-sm-6">          <label  class="control-label col-sm-5">Product Name <small style="color:red">*</small></label>             <div class="col-sm-7"> <input type="text" class="form-control" required name="p_name" value="<?php if($this->input->post('p_name')!='') { echo $this->input->post('p_name'); }  ?>" >          </div>          </div>          		  <div class="form-group col-sm-6">           <label  class="control-label col-sm-3">Category<small style="color:red">*</small></label>            <div class="col-sm-9">  			<select name="category" class="form-control custom-select">			<option selected disabled value="">Select</option> 			  <?php if(!empty($cat)) {				  foreach($cat as $value) {					  echo '<option value="'.$value['id'].'"';					  if($this->input->post('category')==$value['id']) { echo ' selected="selected" '; }					  echo '>'.$value['c_name'].'</option>';				  }			  } ?>			  </select>          </div>            </div>		            <div class="form-group col-lg-6 col-mg-6 col-sm-6">          <label  class="control-label col-sm-5">Actual Price</label>             <div class="col-sm-7"> <input type="number" required="required" class="form-control"  name="p_price" value="<?php if($this->input->post('p_price')!='') { echo $this->input->post('p_price'); }  ?>" >          </div>           </div> 		  		  		   <div class="form-group col-lg-6 col-mg-6 col-sm-6">            <label  class="control-label col-sm-5">Special Price</label>             <div class="col-sm-7"> <input type="number" class="form-control"  name="p_d_price" value="<?php if($this->input->post('p_d_price')!='') { echo $this->input->post('p_d_price'); }  ?>" >          </div>           </div> 
		<div class="form-group col-lg-6 col-mg-6 col-sm-6">            <label  class="control-label col-sm-5">Qty</label>              <div class="col-sm-7"><input type="number" required="required" class="form-control"  name="p_qty" value="<?php if($this->input->post('p_qty')!='') { echo $this->input->post('p_qty'); }  ?>" >          </div>          </div>
		  <div class="form-group col-sm-6">           <label  class="control-label col-sm-5">Set product as new from date</label>            <div class="col-sm-7">   <input type="text" id="datepicker" class="form-control"  name="s_p_n_f_date" value="<?php if($this->input->post('s_p_n_f_date')!='') { echo $this->input->post('s_p_n_f_date'); }  ?>" >          </div>          </div>		  		  		  <div class="form-group col-sm-6">           <label  class="control-label col-sm-5">Set product as new to date</label>          <div class="col-sm-7">     <input type="text" id="datepicker1" class="form-control"  name="s_p_n_to_date" value="<?php if($this->input->post('s_p_n_to_date')!='') { echo $this->input->post('s_p_n_to_date'); }  ?>" >          </div>          </div>
    
  <div class="form-group col-sm-6">
        <label  class="control-label col-sm-3">Image</label>
               <div class="col-sm-9"> <input required type="file" class="form-control"  name="image" ></div>
          </div> 
		 <div class="form-group col-sm-12">            <label  class="control-label">Discription</label>               <textarea class="form-control textarea-editor" name="p_description"><?php if($this->input->post('p_description')!='') { echo $this->input->post('p_description'); } ?></textarea>          </div>
	
				  <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin/deals'; ?>">Cancel </a>
          </div>
		  </div>
        </fieldset>
      <?php echo form_close(); ?>
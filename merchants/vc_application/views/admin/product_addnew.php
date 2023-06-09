	
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
      echo form_open_multipart(base_url().'admin/product/add', $attributes);
	  ?>
      <div class="page-heading"> 
        <h2 class="iod">Add product <ul class="list-inline"><li><a class="btn btn-primary btn-sm" href="<?php echo base_url().'admin/product'; ?>">&laquo; Back</a><li><button type="reset" class="btn btn-primary btn-sm">Reset</button><li><button type="submit" class="btn btn-primary btn-sm">Save</button><li><button type="submit" class="btn btn-primary btn-sm">Save & Continue</button></li></h2>
		<h2 class="iods"><a data-toggle="collapse" data-parent="#accordion" href="#collapse0">General</a> <ul class="list-inline"><li><button class="btn btn-primary btn-sm show-attributes" type="button">Creat New Attribute</button></li></ul></h2>
      </div>
 
      <?php 
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> product added successfully.';
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
		
		<div id="collapse0" class="panel-collapse collapse in">
		 
	  
		<div class="form-group col-sm-12">
          <label  class="control-label col-sm-3">Product Name <small style="color:red">*</small></label>
             <div class="col-sm-9"> <input type="text" class="form-control" required name="p_name" value="<?php if($this->input->post('p_name')!='') { echo $this->input->post('p_name'); }  ?>" >
          </div>
          </div>
		
		<div class="form-group col-sm-12">
             <label  class="control-label col-sm-3">Set Name</label>
           <div class="col-sm-9">   <input type="text" class="form-control"  name="s_name" value="<?php if($this->input->post('s_name')!='') { echo $this->input->post('s_name'); }  ?>" >
          </div>
          </div>
		  
		  
		   <div class="form-group col-sm-12">
           <label  class="control-label col-sm-3">GST <small style="color:red">*</small></label>
            <div class="col-sm-9">   
			
			<select name="t_class" class="form-control custom-select">
			 <option selected disabled value="">Select</option>
			  <?php if(!empty($tax)) {
				  foreach($tax as $value) {
					  echo '<option value="'.$value['id'].'"';
					  if($this->input->post('t_class')==$value['id']) { echo ' selected="selected" '; }
					  echo '>'.$value['title'].' '.$value['amount'].' '.$value['type'].'</option>';
				  }
			  } ?>
			  </select>
          </div>  
          </div> 
		  <input type="hidden" name="category" value="<?php echo $mcat[0]['business_type'];?>" >
		  
		  <div class="form-group col-sm-12">
          <label  class="control-label col-sm-3">Weight/size <small style="color:red">*</small></label>
             <div class="col-sm-9">  <input type="text" placeholder="Example 6,7,8,9" class="form-control" <?php if($mcat[0]['business_type']==31) {echo "";}else {echo "required";}?> name="weight" value="<?php if($this->input->post('weight')!='') { echo $this->input->post('weight'); }  ?>" >
          </div>
          </div>
		  
		  <?php if($mcat[0]['business_type']!=31) { ?>
		       
		  
		  
		  
		  
		   <!--div class="form-group col-sm-12">
           <label  class="control-label col-sm-3">Category<small style="color:red">*</small></label>
            <div class="col-sm-9">  
			<select name="category" class="form-control custom-select">
			<option selected disabled value="">Select</option> 
			  <?php if(!empty($category)) {
				  foreach($category as $value) {
					  echo '<option value="'.$value['id'].'"';
					  if($this->input->post('category')==$value['id']) { echo ' selected="selected" '; }
					  echo '>'.$value['c_name'].'</option>';
				  }
			  } ?>
			  </select>
          </div>  
          </div-->
		  
		  
		  <div class="form-group col-sm-12">
         <label  class="control-label col-sm-3">Color</label>
		
		 
            <div class="col-sm-9">    <input type="text" class="form-control"  name="color" value="<?php if($this->input->post('color')!='') { echo $this->input->post('color'); }  ?>" >
          </div>
          </div>
		  
		  <div class="form-group col-sm-12">
         <label  class="control-label col-sm-3">Model</label>
             <div class="col-sm-9">  <input type="text" class="form-control"  name="model" value="<?php if($this->input->post('model')!='') { echo $this->input->post('model'); }  ?>" >
          </div>
          </div>
		  
		  
		  <?php } ?>
		  
		  <div class="form-group col-sm-12">
           <label  class="control-label col-sm-3">Set product as new from date</label>
            <div class="col-sm-9">   <input type="text" id="datepicker" class="form-control"  name="s_p_n_f_date" value="<?php if($this->input->post('s_p_n_f_date')!='') { echo $this->input->post('s_p_n_f_date'); }  ?>" >
          </div>
          </div>
		  
		  
		  <div class="form-group col-sm-12">
           <label  class="control-label col-sm-3">Set product as new to date</label>
          <div class="col-sm-9">     <input type="text" id="datepicker1" class="form-control"  name="s_p_n_to_date" value="<?php if($this->input->post('s_p_n_to_date')!='') { echo $this->input->post('s_p_n_to_date'); }  ?>" >
          </div>
          </div>
		  
		</div>  
		  
		 
<!-- prices-->	
<div class="col-sm-12">	 
					<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Price<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
         <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
		<h2></h2>
  <div class="form-group col-lg-6 col-mg-6 col-sm-6">
          <label  class="control-label col-sm-5">Actual Price</label>
             <div class="col-sm-7"> <input type="number" required="required" class="form-control"  name="p_price" value="<?php if($this->input->post('p_price')!='') { echo $this->input->post('p_price'); }  ?>" >
          </div> 
          </div> 
		  
		  
		   <div class="form-group col-lg-6 col-mg-6 col-sm-6">
            <label  class="control-label col-sm-5">Special Price</label>
             <div class="col-sm-7"> <input type="number" class="form-control"  name="p_d_price" value="<?php if($this->input->post('p_d_price')!='') { echo $this->input->post('p_d_price'); }  ?>" >
          </div> 
          </div> 
		  
		  <div class="form-group col-lg-6 col-mg-6 col-sm-6">
            <label  class="control-label col-sm-5">Qty</label>
              <div class="col-sm-7"><input type="number" required="required" class="form-control"  name="p_qty" value="<?php if($this->input->post('p_qty')!='') { echo $this->input->post('p_qty'); }  ?>" >
          </div>
          </div>
		  
		  
		  
		  <div class="form-group col-sm-6">
           <label  class="control-label col-sm-5">Special price from Date</label>
             <div class="col-sm-7"> <input type="text" id="datepicker2" class="form-control"  name="spfdate" value="<?php if($this->input->post('spfdate')!='') { echo $this->input->post('spfdate'); }  ?>" >
          </div>
          </div>
		  
		  <div class="form-group col-sm-6">
          <label  class="control-label col-sm-5">Special price to Date</label>
             <div class="col-sm-7"> <input type="text" id="datepicker3" class="form-control"  name="sptdate" value="<?php if($this->input->post('sptdate')!='') { echo $this->input->post('sptdate'); }  ?>" >
          </div>
          </div>
		  
		  
		  
		  
		  
		  
        </div>
        </div>
        </div> 
		
	<!-- prices end-->
	
	<!-- Discription-->		 
					<div class="panel panel-default">
						
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Discription<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
	  
         <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
		 <h2></h2>
		 
		  <div class="form-group col-sm-12">
            <label  class="control-label">Short Discription</label>
              <textarea class="form-control" name="s_discription"><?php if($this->input->post('s_discription')!='') { echo $this->input->post('s_discription'); } ?></textarea>
          </div>
		  
  <div class="form-group col-sm-12">
            <label  class="control-label">Discription</label>
               <textarea class="form-control " name="p_description"><?php if($this->input->post('p_description')!='') { echo $this->input->post('p_description'); } ?></textarea>
          </div>
		  
        </div>
        </div>
        </div> 
		
	<!-- Discription end-->
	
	<!-- Images -->		 
					<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Images<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
         <div id="collapse3" class="panel-collapse collapse">
	 
        <div class="panel-body">
		 <h2></h2>
  <div class="form-group col-lg-6 col-mg-6 col-sm-6">
        <label  class="control-label col-sm-5">Image</label>
               <div class="col-sm-7"> <input type="file" class="form-control"  name="image" ></div>
			    
		  <div class="form-group col-sm-12">
		 <p> <button class="btn btn-success btn-sm add-upload-img" type="button">Add Image</button><br> </p>  
			<div class="add-upload-img-div"></div> 
		  </div>
		  
          </div>
        </div>
        </div>
        </div> 
		
	<!-- images end-->
	
	<div class="panel panel-default">
			<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Attribute<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>
        </h4>
      </div> 
         <div id="collapse4" class="panel-collapse collapse"> 
        <div class="panel-body">
		   <div class="form-group col-sm-12">
		 <p> <br><button class="btn btn-success btn-sm add-attribute" type="button">Add Attribute</button> </p>
		    <div class="col-sm-5"><label>Title</label></div><div class="col-sm-5"><label>Value</label></div>  
			<div class="add-attribute-div"></div> 
		  </div>
		</div> 
		</div>
		</div>
	</div>
				  <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin/product'; ?>">Cancel </a>
          </div>
		  </div>
        </fieldset>
      <?php echo form_close(); ?>
	  
	   <script>
	  jQuery(document).ready(function(){
		  var uid = 999;
		 jQuery('.add-attribute').click(function(){
            var add_attr = '<div class="remove-div-'+uid+'"><div class="form-group col-sm-5"><input placeholder="Title" type="text" required class="form-control" name="a_title[]" value="" ></div><div class="form-group col-sm-6"><input placeholder="Value" type="text" required class="form-control" name="a_value[]" value="" ></div><div class="col-sm-1"><button data=".remove-div-'+uid+'" type="button" class="remove-btn glyphicon glyphicon-remove remove-div"></button></div></div>';
			jQuery('.add-attribute-div').append(add_attr);
			uid++;
		 });
        jQuery('html').on('click','.remove-div',function(){
		  if(confirm('Are you sure ?')) {
           var cls = jQuery(this).attr('data');
		   jQuery(cls).html();
		   jQuery(cls).remove();
		 }
		});		
		
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
	  
	  jQuery('.show-attributes').click(function(){
		  jQuery('.panel-collapse').removeClass('in');
		  jQuery('#collapse4').addClass('in');
	  });
	  });
	  </script>
	     <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.textarea-editor',browser_spellcheck: true, height:350 });</script>
  
 
	
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
      echo form_open_multipart(base_url().'admin/salel/add', $attributes);
	  ?>
      <div class="page-heading"> 
       
		<h2 class="iods"><a data-toggle="collapse" data-parent="#accordion" href="#collapse0">General</a> </h2>
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
          <label   class="control-label col-sm-3">Card Number <small style="color:red">*</small></label>
             <div class="col-sm-9"> <input readonly type="text" class="form-control" required name="p_name" value="<?php echo $this->session->userdata('card_no'); ?>" >
          </div>
          </div>
		  
		</div>  
		
		<div class="col-sm-12">	 

	
	
			
         
       
		   <div class="form-group col-sm-12">
		 <p> <br><button class="btn btn-success btn-sm add-attribute" type="button">Add Product</button> </p>
		   <!--  <div class="col-sm-5"><label>Title</label></div><div class="col-sm-5"><label>Value</label></div>  --> 
		   
		    <?php 
			$cart_contents = 	$this->cart->contents();
		   if(!empty($cart_contents)) {  
		   foreach($cart_contents as $cart) {
		   
		   ?>
		   
		 	<div class="row delete-div-<?php echo $cart['rowid'];?>">
										<div class="col-xs-3">
											<input name="pname[]" type="text"  class="form-control" value="<?php echo $cart['name']; ?>" placeholder="Product" required>
										</div> 
										
										<div class="col-xs-2">
											<input name="qty[]"  type="number" class="form-control price-count qty-input" value="<?php echo $cart['qty']; ?>"  min="1" required>
										</div> 
										
										<div class="col-xs-2">
											<input name="price[]"  class="price-count form-control tprice_input price-input"  value="<?php echo $cart['price']; ?>">
										</div>
										 <div class="col-xs-2">
										
										</div> 
										<div class="col-xs-5"> 
										
										<div class="input-group">
											<input readonly  name="tprice[]" class="price-count form-control tprice_input p_t_price_input" value="<?php echo $cart['g_price'] ?>"  required>
											<div class="input-group-addon delete-product print-hide" data-cls="<?php echo $cart['rowid']; ?>" title="Delete Product"><a href="">-</a></div>
										</div>
										</div>
										
										<input type="hidden" name="pid[]" value="0"  required>
										<input type="hidden" name="gst_percentage[]" class="gst-val" value="0"  required>
									</div>
									
		   <?php    }  } ?>
		   
			<div class="add-attribute-div"></div> 
		  </div>
		
		
		
	</div>
		  	

				  <div class="col-lg-12 col-md-12">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Save</button> &nbsp; 
			 <a class="btn btn-primary" href="<?php echo base_url().'admin/product'; ?>">Cancel </a>
          </div>
		  </div>
        </fieldset>
     
	  
	   <script>
	  jQuery(document).ready(function(){
		  
		 jQuery('.delete-product').click(function(){
			
			var remove_id = jQuery(this).attr('data-cls');
			jQuery.ajax({
				type:"POST",
				url:"<?php echo base_url(); ?>index.php/vc_site_admin/sale/remove_me",
				data: {rowid:remove_id},
				success:function(data){
				 var cls = jQuery(".delete-div-"+remove_id);
			jQuery(cls).html('');
			count_total();
					
				}
			});
			
			
		});
		  
		  
		  var uid = 999;
		 jQuery('.add-attribute').click(function(){
            var add_attr = '<div class="row delete-div-'+uid+'"><div class="col-xs-3"><input name="pname[]" type="text" class="form-control" placeholder="Product" required></div> <div class="col-xs-2"><input name="qty[]" data="'+uid+'" type="number" class="form-control price-count qty-input-'+uid+'" placeholder="Qty." min="1"  required></div> <div class="col-xs-2"><input name="price[]" data="'+uid+'" class="price-count form-control tprice_input price-input-'+uid+'"  placeholder="Price"></div><div class="col-xs-2"><div class="input-group mb-2 mr-sm-2 mb-sm-0"><input type="hidden" data="'+uid+'" class="price-count form-control gst_input gst_input_'+uid+'" name="gst[]" required> </div></div> <div class="col-xs-5"> <div class="input-group"><input  data="'+uid+'" name="tprice[]" class="price-count form-control tprice_input_'+uid+' p_t_price_input" required><div class="input-group-addon delete-product print-hide" title="Delete Product" data-cls="'+uid+'"><a href="" >-</a></div></div></div><input type="hidden" name="pid[]"  required><input type="hidden" name="gst_percentage[]" class="gst-val-'+uid+'" required></div>';
			jQuery('.add-attribute-div').append(add_attr);
			uid++;
		 });
		 
	
		 
        jQuery('html').on('click','.delete-product',function(){
		  if(confirm('Are you sure ?')) {
			var remove_id = jQuery(this).attr('data-cls');
           var cls = jQuery(".delete-div-"+remove_id);
		   jQuery(cls).html();
		   jQuery(cls).remove();
		 }
		});		
		
		/* jQuery('html').on('keyup','.qty_input',function(){
	          var redeem = jQuery("#tprice_input").val();
			  var balance = jQuery(".qty_input").val();
			  var cash = parseFloat(balance*redeem);
			  jQuery(".p_t_price_input").val(cash);
		  }); */
	
	  
	   });
	  
	  </script>
	  
	   <?php echo form_close(); ?>
	  
	     <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.textarea-editor',browser_spellcheck: true, height:350 });</script>
  
 
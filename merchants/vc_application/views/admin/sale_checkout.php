	
     <style>
	 label.checkbox { padding-left: 20px;}
	 .add-more-d-area-div-parent input {margin-bottom: 6px;}
	 label.checkbox{font-weight:normal;}
.delete-product {font-weight: bold;font-size: 30px;line-height: 20px;cursor: pointer;color: #ff0000;}
.selectpicker{max-width:300px;}
.bootstrap-select .dropdown-menu.open{left:-150px;}
form#search_product_form div.bootstrap-select{width:280px;float:left;}
.x_title span {color: #000;font-size: 13px;}
.show-print{display:none;}
.form-control{padding:6px 6px;}
form .row > div{padding-left:5px;padding-right:5px;}
form .row{margin-left:-5px;margin-right:-5px;}
	 </style>
      <div class="page-heading"><a class="btn btn-primary flr" href="<?php echo base_url().'admin/sale'; ?>">Back</a>
        <h2>Add new sale</h2>
		
      </div>
 
      <?php 
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> sale added successfully.';
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
      
     // echo form_open_multipart('admin/sale/add', $attributes);
      ?>
  
			<?php 
			$pid_array = $this->input->post('pid_array');
			if($pid_array=='') {
				$selecte_pid = array();
			} else {
				$selecte_pid = explode(',',$pid_array);
			}
			if($this->input->post('product_name')!='') {
				$selecte_pid[] = $this->input->post('product_name');
			}

			?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title"> 
							
						
						   <form class="form form-inline text-right search_product_form" id="search_product_form" action="<?php echo base_url('admin/sale/sale_checkout');?>" method="post" style="float:right;width: 374px;margin-bottom: 16px;">
						   <select name="product_name" class="form-control selectpicker"  data-live-search="true" required>
						   <option value="">Select Product</option>
						   <?php if(!empty($products)) {
							   foreach($products as $product) {
								   echo '<option value="'.$product['id'].'">'.$product['pname'].'</option>';
							   }
						   } ?>
						   </select> 
						   <input name="customer" type="hidden" value="<?php echo set_value('customer'); ?>" class="customer_search">
						   <input type="hidden" value="<?php echo implode(',',$selecte_pid);?>" name="pid_array">
						   <input type="submit" class="btn btn-primary btn-sm" value="Add Product" name="Submit_product">
						   
						   </form>
							<div class="clearfix"></div>
						</div>
						<div class="col-sm-12">
						
						<!--div class="row show-print"> 
			<div class="col-sm-4"><p><strong>TIN: 03601124632<br>GSTIN: 03ATUPB7623F1ZS</strong></p></div>
			<div class="col-sm-4 text-center"><h3>NAVYUG CYCLE STORE</h3><p><strong>College Road, BARNALA-148101</strong><br>CYCLE & CYCLE SPARE PARTS DEALERS</p></div>
			<div class="col-sm-4 text-right"><p><strong>Ph: 01679-230486(S)<br>M: 94174-01142<br>94630-19886<br>97797-80046<strong></p>   </div>
							</div-->
				<hr class="show-print">			
							
							<form method="post" class="">
								<fieldset>
						   <input type="hidden" value="<?php echo implode(',',$selecte_pid);?>" name="pid_array">
						   
								<div class="row">
								    <div class="col-xs-9">
									<div class="row">
									<div class="col-xs-3"><label>Card No.</label></div>
									<div class="col-xs-9"> <input name="customer" readonly type="text"  value="<?php echo $this->session->userdata('card_no'); ?>" class="form-control customer_search_input" required></div>
									</div>
									
									

									</div>
									<div class="colxs-3 text-right show-print"></div>
								</div>		
								<hr>
									<div class="row">
										<div class="col-xs-3"><label>Product</label></div> 
										
										<div class="col-xs-1"><label>Qty.</label></div> 
										
										 <div class="col-xs-2"><label>Price</label></div> 
										
										 <div class="col-xs-6"><label>Total Price</label></div> 
									</div>
											 <?php 
			$cart_contents = 	$this->cart->contents();
		   if(!empty($cart_contents)) {  
		   foreach($cart_contents as $cart) {
		   
		   ?>
									
									
									
									<div class="row delete-div-<?php echo $cart['rowid'];?>">
										<div class="col-xs-3">
											<input name="pname[]" type="text"  class="form-control" value="<?php echo $cart['name']; ?>" placeholder="Product" required>
										</div> 
										
										<div class="col-xs-1">
											<input name="qty[]"  type="number" class="form-control price-count qty-input" value="<?php echo $cart['qty']; ?>"  min="1" required>
										</div> 
										
										<div class="col-xs-2">
											<input name="price[]"  class="price-count form-control tprice_input price-input"  value="<?php echo $cart['price']; ?>">
										</div>
										 <div class="col-xs-2">
										
										</div> 
										<div class="col-xs-6"> 
										
										<div class="input-group">
											<input readonly  name="tprice[]" class="price-count form-control tprice_input p_t_price_input" value="<?php echo $cart['g_price'] ?>"  required>
											<div class="input-group-addon delete-product print-hide" data-cls="<?php echo $cart['rowid']; ?>" title="Delete Product">-</div>
										</div>
										</div>
										
										<input type="hidden" name="gst[]" value="0"  required>
										<input type="hidden" name="pid[]" value="0"  required>
										<input type="hidden" name="gst_percentage[]" class="gst-val" value="0"  required>
									</div>
									
									<?php    }  } ?>
								
									<?php $grand_total = 0;
									if(!empty($products)) {
							   foreach($products as $product) {
								if(in_array($product['id'],$selecte_pid)) {   
							   ?>
									<div class="row delete-div-<?php echo $product['id'];?>">
										<div class="col-xs-3">
											<input name="pname[]" type="text" value="<?php echo $product['pname'];?>" class="form-control" placeholder="Product" required>
										</div> 
										<div class="col-xs-2">
											<input name="code[]" type="text" value="<?php echo $product['p_id'];?>" class="form-control" placeholder="Code" required>
										</div> 
										<div class="col-xs-1">
											<input name="qty[]" data="<?php echo $product['id'];?>" type="number" value="1" class="form-control price-count qty-input-<?php echo $product['id'];?>" placeholder="Qty." min="1" max="<?php echo $product['p_qty'];?>" required>
										</div> 
										<div class="col-xs-1">
											<input name="size[]" type="text" value="" class="form-control" placeholder="Size">
										</div> 
										<div class="col-xs-1">
											<input name="price[]" data="<?php echo $product['id'];?>" class="price-count form-control tprice_input price-input-<?php echo $product['id'];?>" value="<?php echo $product['price']; ?>"  placeholder="Price">
										</div>
										 <div class="col-xs-2">
										<div class="input-group mb-2 mr-sm-2 mb-sm-0">
											<div class="input-group-addon print-hide"><?php echo $product['t_class']; ?>%</div>
											<input readonly data="<?php echo $product['id'];?>" class="price-count form-control gst_input gst_input_<?php echo $product['id'];?>" name="gst[]" value="<?php   $gstt = ($product['t_class'] * $product['price']) / 100; echo $gst = round($gstt,2);?>" onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'" required> 
										</div>
										</div> 
										<div class="col-xs-2"> 
										<div class="input-group">
											<input readonly data="<?php echo $product['id'];?>" name="tprice[]" class="price-count form-control tprice_input_<?php echo $product['id'];?> p_t_price_input" value="<?php echo $total_price = $gst + $product['price']; $grand_total = $grand_total + $total_price; ?>" onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'" required>
											<div class="input-group-addon delete-product print-hide" title="Delete Product" data-cls=".delete-div-<?php echo $product['id'];?>">-</div>
										</div>
										</div>
										
										<input type="hidden" name="pid[]" value="<?php echo $product['id'];?>" required>
										<input type="hidden" name="gst_percentage[]" class="gst-val-<?php echo $product['id'];?>" value="<?php echo $product['t_class'];?>" required>
									</div>
									<br>
									<?php 
								}
							   }
									}
							   ?>
									
							<hr>
									
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"><label>Sub Total</label></div>
									<div class="col-xs-2 input-group"><input name="before_tax_amount" type="text" value="<?php echo $grand_total; ?>" class="form-control price_input_total total_input" required onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'"></div>
								</div>	
								
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"><label>Total GST</label></div>
									<div class="col-xs-2 input-group"><input name="total_gst" type="text" value="" class="form-control gst_input_total total_input" required onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'"></div>
								</div>	
								
								<div class="row print-hide">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"><label>Payment Type</label></div>
									<div class="col-xs-2 input-group">
									<select name="payment_type" class="form-control" required>
									<option value="Cash">Cash</option>
									<option value="DD">DD</option>
									<option value="NEFT">NEFT</option>
									<option value="Net Banking">Net Banking</option>
									<option value="Paytm">Paytm</option>
									</select>
									</div>
								</div>	
								
								<div class="row print-hide">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"></div>
									<div class="col-xs-2 input-group"><input name="slip_no" placeholder="DD/Neft NO" type="text"  class="form-control"></div>
								</div>
								
								
								<div class="row print-hide">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"><label>Discount</label></div>
									<div class="col-xs-2 input-group"><input name="discount" type="text" value="<?php echo set_value('discount'); ?>" class="form-control discount_input" required onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'"></div>
								</div>	
								
								<div class="row print-hide">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-4"><label>Grand Total</label></div>
									<div class="col-xs-2 input-group"><input name="gtotal" type="text" value="<?php echo $grand_total; ?>" class="form-control grand_total_input" required onfocus="if (this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'"></div>
								</div>	
								
									<input name="auth_v" id="auth_v" type="hidden" value="<?php echo $this->session->userdata('auth'); ?>" >
									
									<input id="show_invoice"   type="submit" name="buttonSubmits" value="Generate Invoice" class="btn btn-success print-hide" /> 
									
									
								</fieldset>
							</form>
							<hr class="show-print">
							<br/>
							<div class="col-md-8" id="card_verify"> 
							<div id="register-msg-div"></div>
							<div class="col-xs-6">
							
							
											 <form class="form" action="" method="post" id="popup-register-form">
       
	  <input type="number" min="1" maxlength="10" name="phone" placeholder="Enter Card No. For Verification" class="form-control input-empty">
      
       
       <p class="otp_vrfy" style="display:none"><label>OTP</label> <input type="number" min="1" maxlength="4" name="otp" class="form-control input-empty"></p>
  
       
										</div> 
										
										<div class="col-xs-2 snd-otp" style="margin-bottom:45px;">
										<label>&nbsp;</label> <input type="submit" name="submit" value="Send Otp" class="btn btn-primary popup-register-button"> 
										</div>
										
										<div class="col-xs-2 verify" style="margin-bottom:45px; display:none">
										<label>&nbsp;</label> <input type="submit" name="submit" value="Verify Otp" class="btn btn-primary popup-register-button"> 
										</div>
										
										
			</form>							
										
									
										
										
							</div>
		
						</div> <!-- /content --> 
					</div><!-- /x-panel --> 
				</div> <!-- /col --> 
			</div> <!-- /row --> 
		</div>
	</div> <!-- /.col-right --> 
	<!-- /page content -->

	<?php //$this->load->view('admin/partials/admin_footer'); ?>
	
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-select.min.css');?>" />
  <script src="<?php echo base_url('assets/js/bootstrap-select.min.js');?>"></script>
	<script>
	jQuery('document').ready(function(){
		
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
		
		
		jQuery('.selectpicker').change(function(){
			var valu = jQuery('.customer_search_input').val();
			jQuery('.customer_search').val(valu);
			jQuery('#search_product_form').submit();
		});
		
		jQuery('.price-count').keyup(function(){
			var id = jQuery(this).attr('data');
			if(jQuery('.qty-input-'+id).val() != '' && jQuery('.qty-input-'+id).val() != '0' && jQuery('.price-input-'+id).val() != '' && jQuery('.price-input-'+id).val() != '0') {
				tprice = parseFloat(jQuery('.qty-input-'+id).val()) * parseFloat(jQuery('.price-input-'+id).val());
				var after_gst = (parseFloat(jQuery('.gst-val-'+id).val()) * parseFloat(tprice)) / 100;
				var total_gst = parseFloat(tprice) + parseFloat(after_gst);
				jQuery('.gst_input_'+id).val(after_gst.toFixed(2));
				jQuery('.tprice_input_'+id).val(total_gst.toFixed(2));
			} 
			count_total();
		}); 
		
		
		jQuery('.price-count').click(function(){
			var id = jQuery(this).attr('data');
			if(jQuery('.qty-input-'+id).val() != '' && jQuery('.qty-input-'+id).val() != '0' && jQuery('.price-input-'+id).val() != '' && jQuery('.price-input-'+id).val() != '0') {
				tprice = parseFloat(jQuery('.qty-input-'+id).val()) * parseFloat(jQuery('.price-input-'+id).val());
				var after_gst = (parseFloat(jQuery('.gst-val-'+id).val()) * parseFloat(tprice)) / 100;
				var total_gst = parseFloat(tprice) + parseFloat(after_gst);
				jQuery('.gst_input_'+id).val(after_gst.toFixed(2));
				jQuery('.tprice_input_'+id).val(total_gst.toFixed(2));
			} 
			count_total();
		}); 
		
		jQuery('.delete-product').click(function(){
			var cls = jQuery(this).attr('data-cls');
			jQuery(cls).html('');
			count_total();
		});
		
		jQuery('.price_input').click(function(){ count_total(); });
		jQuery('.price_input').keyup(function(){ count_total();	});
		
		jQuery('.tprice_input').click(function(){ count_total(); });
		jQuery('.tprice_input').keyup(function(){ count_total();	});
		
		jQuery('.total_input').click(function(){ count_total(); });
		jQuery('.total_input').keyup(function(){ count_total();	});
		/*
		jQuery('.sgst_select').change(function() {
			var sgst = 0;
			sgst = sgst + (parseFloat(jQuery(this).val()) * parseFloat(jQuery('.price_input_total').val())) / 100;
			jQuery('.sgst_select_total').val(sgst);
			count_total();
		});
		
		jQuery('.cgst_select').change(function() {
			var cgst = 0;
			cgst = cgst + (parseFloat(jQuery(this).val()) * parseFloat(jQuery('.price_input_total').val())) / 100;
			jQuery('.cgst_select_total').val(cgst);
			count_total();
		});
		*/
		 
		
		jQuery('.discount_input').click(function(){ count_total(); });
		jQuery('.discount_input').keyup(function(){ count_total();	});
		count_total();
		function count_total(){ 
			var gst_input = 0;
			jQuery('.gst_input').each(function(){
				if(jQuery(this).val() != '') {
					gst_input = gst_input + parseFloat(jQuery(this).val());
				}
			});
			jQuery('.gst_input_total').val(gst_input.toFixed(2)); 
			
			var ltr_total = 0;
			jQuery('.p_t_price_input').each(function(){
				if(jQuery(this).val() != '') {
					ltr_total = ltr_total + parseFloat(jQuery(this).val());
				}
			});
			var sub_total = parseFloat(ltr_total) - parseFloat(gst_input);
			jQuery('.price_input_total').val(sub_total.toFixed(2)); 
			
			
			var amount_total = 0;
			jQuery('.total_input').each(function(){
				if(jQuery(this).val() != '') {
					amount_total = amount_total + parseFloat(jQuery(this).val());
				}
			});
			if(jQuery('.discount_input').val() != '' && jQuery('.discount_input').val() != '0') {
			    amount_total = amount_total - parseFloat(jQuery('.discount_input').val());
			}
			jQuery('.grand_total_input').val(amount_total.toFixed(2)); 
		}
		
	}); 
	</script>
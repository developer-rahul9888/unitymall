	<?php //$this->load->view('admin/partials/admin_header.php'); ?>
	<!-- page content -->
	<style>
.right_col{font-size:15px;}
hr{border:1px solid #bbb}
	</style>
	<link rel="stylesheet" type="text/css" media="print" href="<?php echo base_url('assets/css/print.css');?>">
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left"> <h2>Invoice</h2>
				</div>
			</div>
			<div class="clearfix"></div>
			
			<div class="col-sm-4 mobile-hide"></div>
			<div class="col-sm-4 mobile-hide text-center no-print"><button class="btn btn-success" onclick="window.print();">Print</button></div>
			<div class="col-sm-4 mobile-hide text-right no-print"><a href="<?php echo base_url('admin/sale');?>" class="btn btn-primary b">Back</a></div>
			<div class="clearfix"></div>
			<hr class="mobile-hide">
			<div class="clearfix"></div>
			
			 <?php 
			 if(empty($invoice) && empty($customer_info)) { echo 'Please check your incoice number'; }
			 else {
			 $info = $invoice[0]; 
			 $cust = $customer_info[0];
			 ?>
			  
			<div class="clearfix"></div>
			
			 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel"> 
						<div class="x_content">
							<div class="row"> 
			<div class="col-sm-12 text-center"><h3>Wishzon</h3><p><strong></strong><br>
			
			<?php if($info['billing_city']=='Pinjore'){ echo 'Panchkula Haryana, India, 134102 <br>CIN(corporate Identity Number): U74999HR2017PTC070987<br>
			GST(Goods and Services Tax): 06AAECH3271K1ZJ <br>Email: info@wishzon.com</p>';}elseif($info['billing_city']=='Jhansi'){echo '01 In front of Metro Hospital, Main road, Hansari, Jhansi, U.P, 284001 <br>CIN(corporate Identity Number): U74999HR2017PTC070987<br>
			GST(Goods and Services Tax): 09AAECH3271KIZD <br>Email: info@wishzon.com</p>';}else{echo 'Panchkula Haryana, India, 134102 <br>CIN(corporate Identity Number): U74999HR2017PTC070987<br>
			GST(Goods and Services Tax): 06AAECH3271K1ZJ <br>Email: info@wishzon.com</p>';} ?>
			
			
			</div>
							</div>
							
			<div class="clearfix"></div>
	 
			<hr> 
							<form method="post">
								<fieldset> 
								 <div class="row"> 
			<div class="col-sm-12 text-center"><h3>TAX INVOICE</h3></div>
							</div>
							<br>
								<div class="row">
									<div class="col-xs-2"><label>Invoice: </label></div>
									<div class="col-xs-3">Wishzon 2018 #<?php echo $info['id']; ?></div>  
									<div class="col-xs-2"></div>   
									<div class="col-xs-2"><label>Invoice Date: </label></div>
									<div class="col-xs-3"> <?php echo date('d F Y',strtotime($info['tdate'])); ?></div>  
								</div>		

								<div class="row">
									<div class="col-xs-2"><label>Dist: </label></div>
									 <div class="col-xs-3"> <?php echo $cust['customer_id']; ?>, <?php echo $cust['f_name'].' '.$cust['l_name']; ?></div>  
									<div class="col-xs-2"></div>   
									<div class="col-xs-2"><label>Print Date: </label></div>
									<div class="col-xs-3"> <?php echo date('d F Y'); ?></div>  
								</div>		
								
								
								<hr> 
									<div class="row">
									    <div class="col-xs-1 text-center"><label>#</label></div> 
										<div class="col-xs-3 text-center"><label>Product</label></div> 
										<div class="col-xs-1 text-center"><label>Code</label></div> 
										<div class="col-xs-1 text-center"><label>Qty.</label></div> 
										<div class="col-xs-1 text-center"><label>Size</label></div> 
										 <div class="col-xs-1 text-center"><label>Price</label></div> 
										 <div class="col-xs-2 text-center"><label>GST ( CGST+SGST )</label></div> 
										 <div class="col-xs-2 text-center"><label>Total Price</label></div>  
									</div>
									<hr>
									<?php 
									$products = array();
									if(!empty($info['products'])) {
										$products = json_decode($info['products'],true);
									}
									if(!empty($products)) {
										$i=1;
										
							   foreach($products as $product) { 
                                $prod = explode('~~',$product);	
                                 ?>
									<div class="row"> 
									    <div class="col-xs-1 text-center"><?php echo $i;?></div>
										<div class="col-xs-3 text-center"><?php echo $prod[1];?></div>
										<div class="col-xs-1 text-center"><?php echo $prod[2];?></div>
                                        <div class="col-xs-1 text-center"><?php echo $prod[3];?></div> 	
										<div class="col-xs-1 text-center"><?php echo $prod[4];?></div> 
										 <div class="col-xs-1 text-center"><?php echo $prod[5];?></div>  
										<div class="col-xs-2 text-center">(<?php echo $prod[8];?>%) <?php echo $prod[6];?></div> 
										 <div class="col-xs-2 text-center"><?php echo $prod[7];?></div>  
									</div>
									<br>
									<?php 
									$i++;
								}
							   }
									
							   ?>
								 
									<hr> 
									
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-3 text-right"><label>Sub Total</label></div>
									<div class="col-xs-3 text-right">Rs. <?php echo $info['before_tax_amount']; ?></div>
								</div>	
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-3 text-right"><label>Total GST ( CGST+SGST )</label></div>
									<div class="col-xs-3 text-right">Rs. <?php echo $info['total_gst']; ?></div>
								</div>	
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-3 text-right"><label>Payment Type</label></div>
									<div class="col-xs-3 text-right"><?php echo $info['payment_type']; ?></div>
								</div>	
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-3 text-right"><label>Discount</label></div>
									<div class="col-xs-3 text-right">Rs. <?php echo $info['discount']; ?></div>
								</div>	
								<div class="row">
								    <div class="col-xs-6"></div>
								    <div class="col-xs-3 text-right"><label>Grand Total</label></div>
									<div class="col-xs-3 text-right">Rs.<label><?php echo $info['gtotal']; ?></label></div>
								</div>	
								
								</fieldset>
							</form>
						
							<hr>
							<br/>
                        <div class="row">
							<div class="col-sm-12 col-xs-12"><p>Declaration :
We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.</p></div>
							</div>
							<br/>
							<div class="row">
							<div class="col-sm-7 col-xs-7"><p>Prepared By : Wishzon Team</p></div>
<div class="col-sm-5 col-xs-5 text-right"> 
<p>Customer : <?php echo $cust['f_name'].' '.$cust['l_name']; ?></p>
<p></p></div>
							</div>
									
						</div> <!-- /content --> 
					</div><!-- /x-panel --> 
				</div> <!-- /col --> 
			</div> <!-- /row --> 
			 <?php } ?>
		</div>
	</div> <!-- /.col-right --> 
	<!-- /page content -->

	<?php //$this->load->view('admin/partials/admin_footer'); ?>
	<script>
	jQuery('document').ready(function(){
		jQuery('.delete-product').click(function(){
			var cls = jQuery(this).attr('data-cls');
			jQuery(cls).html('');
		});
	});
	</script> 

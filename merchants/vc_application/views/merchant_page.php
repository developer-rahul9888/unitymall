<div class="clearfix"></div>
	
<div class="container">
<?php if(empty($merchant)) { ?>
	<h2>Merchant not found</h2>
	<p>This merchant not found please check the url.</p>
	<?php } else { 
	$merchant = $merchant[0];
	?>
	
	<h2><?php echo $merchant['d_name'];?></h2>
	
	<p>Merchant ID: <strong><?php echo $merchant['merchant_id'];?></strong></p>
	<p>Phone: <?php echo $merchant['phone'];?></p>
	
	<?php } ?>

 
	
</div>
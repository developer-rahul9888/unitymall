



<div class="container">
<?php if(empty($products)) { ?><h2> Products not found. Please try with other keyword.</h2>
<?php } else { ?> 
<section>		
<div class="container">			
<div class="row">				
<div class="col-sm-12 padding-right">              
<h2 class="title text-center">Search Products</h2>									
<?php if(!empty($products)) { 	foreach($products as $prod) {	
									if($prod['cost']==$prod['p_d_price']){$discount="";}
									else{$disc=$prod['cost']-$prod['p_d_price'];		
									$discount="<p class='disc'>".round($disc/$prod['cost']*100) ."% OFF </p>";}				
									if($prod['cost']==$prod['p_d_price']){$procost="";}else{$procost="<span> ₹".$prod['cost']."</span>";}						
									echo ' <div class="col-sm-3">						
									<div class="product-image-wrapper">					
									<div class="single-products">						
									<div class="productinfo text-center">'.$discount.'';																			
									if($prod['image']==''){ echo '<img src="'.base_url().'merchants/images/product/51qadqTr8ML.jpg" class="img-togg">'; }		    
									else { echo '<img src="'.base_url().'main-admin/images/product/'.$prod['image'].'" class="img-responsive">'; }											
									echo'<h2>₹'.$prod['p_d_price'].'</h2>
									<p>'.$prod['pname'].'</p>
									<a href="'.base_url().'bliss-product/'.$prod['p_id'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>										</div>																		</div>								
																
									</div>	</div>						';				
									}
									} ?>							
									</div>			
									</div>		
									</div>	
									</section>						
									<?php } /**************** endif category not found ******************/ ?>
									</div>
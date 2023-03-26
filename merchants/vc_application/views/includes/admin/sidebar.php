
 <div class="col-sm-2 side-bar">

 <ul>
<li><a href="<?php echo base_url();?>admin/profile">My Profile</a></li>
<li><a href="<?php echo base_url();?>admin/password">Change Password</a></li> 
 
 <?php if($this->session->userdata('access')==1){?>
 <li class="dropdown">  <a class="" href="<?php echo base_url();?>admin/product">Product</a></li>
 <li class="dropdown">  <a class="" href="<?php echo base_url();?>admin/sale">Sale</a></li>
 <li class="dropdown">  <a class="" href="<?php echo base_url();?>admin/deals/add">Deals</a></li>
 <li class="dropdown">  <a class="" href="<?php echo base_url();?>admin/order">My orders</a></li>
 <li class="dropdown">  <a class="" href="<?php echo base_url();?>admin/credit/add">Add Sale</a></li>
 
 <?php } ?>
 </ul>
 </div>
 <!--side bar close -->
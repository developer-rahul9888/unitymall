<!DOCTYPE html>
<html lang="en">
<head>
<title>Unitymall</title>
<?php 
if($page_keywords != ''){ echo '<meta name="description" content="'.$page_keywords.'">'; }
if($page_description !=''){ echo '<meta name="keywords" content="'.$page_description.'">'; }
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/front/css/style.css" rel="stylesheet" type="text/css">
 <script src="<?php echo base_url(); ?>assets/front/js/jquery-1.12.3.min.js"></script>

</head>
<body <?php if($page_slug != ''){ echo 'class="'.$page_slug.'"'; }?>> 
 
  
<div class="full-container">
<header>
<div class="col-sm-12 h-0-9">


<div class="">
 <nav role="navigation" class="navbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
	<a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/front/images/logo.png" alt="Unity Mall"></a>			
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                
                <li><a href="<?php echo base_url();?>../">HOME</a></li>
                <li><a href="#">FAQS</a></li>
                <li><a href="<?php echo base_url();?>/admin/signup">REGISTER</a></li>
                <!--li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">REGISTER <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>admin/signup">Create store</a></li>
                        <li><a href="<?php echo base_url();?>admin/ondemand_create_member">Work with us</a></li>
                    </ul>
                </li-->
                <li><a href="<?php echo base_url();?>admin">LOG IN</a></li>
            </ul>
        </div>
    </nav> 

 </div>


</div>
</header>
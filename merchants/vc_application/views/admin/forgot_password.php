<!DOCTYPE html> 
<html lang="en-US">
  <head>
    <title>Wishzon | forgot password</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>assets/css/global-admin.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/main.css">
  </head>
  <body class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/front/images/Great-Business-Models.jpg');">
    <div class="container">
<div class="col-lg-12 register-form">

<div class="clearfix"></div>
      <?php  
if(isset($message_error) && $message_error){
          echo '<br><div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Error!</strong> email is wrong.';
          echo '</div>';             
      }
	  if($this->session->flashdata('register') && $this->session->flashdata('register')=='true'){
             $this->session->set_flashdata('register', 'false'); 
          echo '<br><div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Register successfully please login now.';
            //echo 'Check your email inbox/spam and click the link given in email to verify your account.';
          echo '</div>';             
      }
?>
<?php echo validation_errors(); ?>


<div class="clearfix"></div>

<?php
      $attributes = array('class' => 'col-sm-6 col-sm-offset-3 sgup');
      echo form_open(base_url().'admin/forgot-password', $attributes);
?>
<div class="col-lg-12  text-center"><a href="<?php echo base_url(); ?>"><img width="300px;" class="img-responsive" src="<?php echo base_url(); ?>/assets/front/images/logo.png"></a></div>
      <h4 class="text-center">Forgot password</h4>

<input type="email" required value="<?php if($this->input->post('user_email')!='') { echo $this->input->post('user_email'); } ?>" class="form-control" name="user_email" placeholder="Email">
     
      <br />

 <div class="col-sm-6 lik">
<a href="<?php echo base_url(); ?>admin/signup">Register</a><br>
<a href="<?php echo base_url(); ?>admin">Sign In</a><br>
<!--a href="#">Resend Verification Link</a-->
</div>
 <div class="login100-form-btn aa"><input type="submit" value="Send" class="login100-form-btn" name="submit"></div>
 
<?php 
      echo form_close();
      ?>      

    </div> 
	</div><!--container-->

  </body>
</html>
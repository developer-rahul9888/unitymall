<!DOCTYPE html>
<html lang="en">
<head>
	<title>Unitymall</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/front/images/Great-Business-Models.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
			
			<div class="col-lg-12  text-center"><a href="https://www.unitymall.in/merchants/"><img width="250px;" src="https://www.unitymall.in/merchants//assets/front/images/logo.png"></a></div>
				
				
      <?php  
if(isset($message_error) && $message_error){
          echo '<br><div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Error!</strong> email or password is wrong.';
          echo '</div>';             
      }

if(isset($message_error_pending) && $message_error_pending){
          echo '<br><div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Error!</strong> your email confirmation is not complete.';
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
<?php
      $attributes = array('class' => 'login100-form validate-form p-b-33 p-t-5');
      echo form_open(base_url().'admin/login/validate_credentials', $attributes);
?>
				
				<span class="login100-form-title">
					Account Login
				</span>
				

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input value="<?php if($this->input->post('user_name')!='') { echo $this->input->post('user_name'); } ?>" class="input100" type="text" name="user_name" placeholder="User name">
						
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
						
						
						<a href="<?php echo base_url(); ?>admin/signup" class="login100-form-btn" type="submit" name="submit">
							Register
						</a>
						
					</div>
					<a style="margin:30px 23px 150px ;" href="<?php echo base_url(); ?>admin/forgot-password">Forgot Password</a><br>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
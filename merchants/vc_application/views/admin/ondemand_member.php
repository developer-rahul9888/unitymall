<!DOCTYPE html> 
<html lang="en-US">
  <head>
    <title>Wishzon | on demand</title>
    <meta charset="utf-8">
    <link href="<?php echo base_url(); ?>assets/css/global-admin.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container">

<div class="col-lg-12 register-form">
<div class="col-lg-12  text-center"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/assets/front/images/logo.png"></a></div>
<div class="clearfix"></div>
      <?php 
if($this->session->flashdata('ondemand') && $this->session->flashdata('ondemand')=='already'){
          echo '<br><div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Phone NO already exist. Please try with other Phone No.';
          echo '</div>';             
      }
	  
	  if($this->session->flashdata('register') && $this->session->flashdata('register')=='true'){
             $this->session->set_flashdata('register', 'false'); 
          echo '<br><div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Register successfully.';
          echo '</div>';             
      }

?>
<?php echo validation_errors(); ?>
<div class="clearfix"></div>

<?php
      $attributes = array('class' => 'col-sm-6 col-sm-offset-3', 'enctype' => 'multipart/form-data');
      echo form_open(base_url().'admin/ondemand_create_member', $attributes);
?>
      <h4 class="text-center">Work with us</h4>

<input type="text" required value="<?php if($this->input->post('dname')!='') { echo $this->input->post('dname'); } ?>" class="form-control" name="dname" placeholder="Display Name"> 
	  <br>
	  <input type="text" required value="<?php if($this->input->post('phone')!='') { echo $this->input->post('phone'); } ?>" class="form-control" name="phone" placeholder="Phone"> 
	  <br>
	  
	  
			<select name="category" class="form-control custom-select">
			<option selected disabled value="">Select Category</option>  
			  <?php if(!empty($category)) {
				  foreach($category as $value) {
					  echo '<option value="'.$value['id'].'"';
					  if($this->input->post('category')==$value['id']) { echo ' selected="selected" '; }
					  echo '>'.$value['c_name'].'</option>';
				  }
			  } ?>
			  </select>
			  <br/>
			  <input type="city"  value="<?php if($this->input->post('city')!='') { echo $this->input->post('city'); } ?>" class="form-control" name="city" placeholder="city"> 
	  <br>
	  <input type="state"  value="<?php if($this->input->post('state')!='') { echo $this->input->post('state'); } ?>" class="form-control" name="state" placeholder="state"> 
	  <br>
          <input type="file" class="form-control"  name="image" >
     <br>
      
	  </div>
	  <div class="col-sm-6 text-right">
<input type="submit" value="Register" class="btn btn-large btn-primary" name="submit"></div>
     
 
<p></p>
<?php 
      echo form_close();
      ?>      

    </div>
	</div><!--container-->

  </body>
</html>
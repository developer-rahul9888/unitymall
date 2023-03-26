<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Unitymall</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/global-admin.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/front/css/main.css">
</head>

<body class="container-login100">
  
 <!-- <div class="col-sm-12 banner">
    <div class="col-sm-6"></div>
    <div class="col-sm-6 imgdiv">
      <h4 class="text-center">Shop from your favourite sites and get <br><span>Attractive Cashback</span></h4>
      <div class="proo">
        <img src="/merchants/assets/front/images/amazon.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/mynn.jpg" alt="">
      </div>

      <div class="proo">
        <img src="/merchants/assets/front/images/wow.jpg" alt="">
      </div>

      <div class="proo">
        <img src="/merchants/assets/front/images/ajio.png" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/shop.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/snap.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/zz.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/clo.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/oz.jpg" alt="">
      </div>
      <div class="proo">
        <img src="/merchants/assets/front/images/amazon.jpg" alt="">
      </div>
      <p class="text-center">Get a chance to earn Upto Rs. 6 CR Coupons</p>
    </div>
  </div>   -->

  <div class="row">
 <!--   <div class="col-sm-6">
      <div class="left">
        <img src="/merchants/assets/front/images/login_element.jpg" alt="">
        <img src="/merchants/assets/front/images/login_element2.jpg" alt="">
        <img src="/merchants/assets/front/images/login_element3.jpg" alt="">
      </div>
    </div>   -->

    <div class="col-sm-12 register-form">
      <!-- <div class="clearfix"></div> -->
      <?php
      if (isset($message_error) && $message_error) {
        echo '<br><div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo '<strong>Error!</strong> email or password is wrong.';
        echo '</div>';
      }
      if ($this->session->flashdata('register') && $this->session->flashdata('register') == 'already') {
        echo '<br><div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo 'Email already exist. Please try with other email.';
        echo '</div>';
      }

      ?>
      <?php echo validation_errors(); ?>
      <!-- <div class="clearfix"></div> -->

      <?php
      $attributes = array('class' => 'col-sm-8 col-sm-offset-3 sgup');
      echo form_open(base_url() . 'admin/create_member', $attributes);
      ?>
      <div class="col-lg-12  text-center"><a href="<?php echo base_url(); ?>"><img width="250px;" src="<?php echo base_url(); ?>/assets/front/images/logo.png"></a></div>
      <h4 class="text-center">Register New Seller</h4>

      <center>
        <label class="radio-inline"> <b>Register As </b></label>
        <label class="radio-inline register-radio">
          <input required type="radio" name="access" value="1">Create store
        </label>
        <label class="radio-inline register-radio">
          <input required type="radio" name="access" value="2">Service Provider
        </label>
      </center>
      <br />
      <br />
      <input type="text" required value="<?php if ($this->input->post('dname') != '') {
                                            echo $this->input->post('dname');
                                          } ?>" class="form-control" name="dname" placeholder="Display Name">
      <br />

      <input type="text" required value="<?php if ($this->input->post('phone') != '') {
                                            echo $this->input->post('phone');
                                          } ?>" class="form-control" name="phone" placeholder="Phone">
      <br>
      <input type="email" required value="<?php if ($this->input->post('email') != '') {
                                            echo $this->input->post('email');
                                          } ?>" class="form-control" name="email" placeholder="Email">
      <br>
      <input type="password" required value="" class="form-control" name="password" placeholder="Password">
      <br>
      <input type="password" required value="" class="form-control" name="cpassword" placeholder="Retype Password">
      <br />

      <br>
      <input type="text" required value="" class="form-control" name="gst" placeholder="GST No">
      <br />

      <br>
      <input type="text" required value="" class="form-control" name="store_name" placeholder="Store Name">
      <br />



      <div class="login100-form-btn" style="width: 10px;float: right;"><a href="<?php echo base_url(); ?>admin" style="color:#fff">Sign In</a>
      </div>
      <div class="login100-form-btn-right">
        <input type="submit" value="Register" class="login100-form-btn" name="submit">
      </div>


      <p></p>
      <?php
      echo form_close();
      ?>

    </div>
  </div>
  <!--container-->
</body>

</html>
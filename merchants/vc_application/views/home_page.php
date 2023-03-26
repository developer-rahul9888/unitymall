<div class="col-sm-12 slider">
   <img src="<?php echo base_url(); ?>assets/front/images/slider.jpg">
   <div class="slider-text">
      <h2 class="text-center">The fastest way to sell your products</h2>
   </div>
</div>

<div class="col-sm-12 ab-0-9" style="background:#fff;">
   <div class="container">
      <h2>What we offer ?</h2>
      <div class="ab-0-8">
         <div class="col-sm-6">
            <div class="about-data">
               <ul>
                  <li>Seller Dashboard where you manage your Inventory.
                  </li>
                  <li>Low Commission Fees, No listing Fees</li>
                  <li>Manage Inventory and calculate ROI within the Seller dashboard
                  </li>
                  <li>Ability to manage products</li>
                  <li>Ability to Gain hundreds of new Customers </li>
               </ul>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="about-data">
               <ul>
                  <li>No Sign Up Fee, No Monthly Fees ; No Hosting Fees, No Paid Search Costs</li>
                  <li>Set deals, price alerts and giveaways</li>
                  <li>Secure and protected from fraudulent purchases.</li>
                  <li>Get money within 24 hrs from the receipt of product voucher
                  </li>
                  <li>Social Media and Email Marketing Built in
                  </li>
               </ul>
            </div>
         </div>

      </div>


   </div>
</div>


<div class="col-sm-12 ab-0-9">
   <h2>Zero Effort. Zero Risk.</h2>
   <div class="ab-0-8">
      <div class="col-sm-3">

         <div class="about-data">
            <img src="<?php echo base_url(); ?>assets/front/images/i2.png" class="img-responsive center-block">
            <div class="about-d-0">
               <strong>Start making sales right away
               </strong>
               <span>Unitymall will show your products to thousands of consumers across India
               </span>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="about-data">
            <img src="<?php echo base_url(); ?>assets/front/images/i1.png" class="img-responsive center-block">
            <div class="about-d-0">
               <strong>There are no fees unless you sell
               </strong>
               <span>Unitymall works on a revenue sharing model. We get paid when you do. You will not be charged until you make your first sale.</span>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="about-data">
            <img src="<?php echo base_url(); ?>assets/front/images/i4.png" class="img-responsive center-block">
            <div class="about-d-0">
               <strong>Effective mobile commerce</strong>
               <span>Sell your products directly to thousands of consumers on their mobile devices.
               </span>
            </div>
         </div>
      </div>
      <div class="col-sm-3">
         <div class="about-data">
            <img src="<?php echo base_url(); ?>assets/front/images/i3.png" class="img-responsive center-block">
            <div class="about-d-0">
               <strong>Reach relevant consumers</strong>
               <span>We will show your products to relevant consumers based on their demographics, purchase behavior and wishlists.</span>
            </div>
         </div>

      </div>
   </div>


</div>

<!-- step  close -->
<!-- zero  risk  close -->
<div class="col-sm-12 ab-0-0">
   <div class="container">
      <div class="text-center fu-0">
         <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>assets/front/images/s1.png">
            <h3>Step 1</h3>
            <span>Upload your products</span>
         </div>
         <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>assets/front/images/s2.png">
            <h3>Step 2</h3>
            <span>Millions of relevant consumers see your products</span>
         </div>
         <div class="col-sm-4">
            <img src="<?php echo base_url(); ?>assets/front/images/s3.png">
            <h3>Step 3</h3>
            <span>Quickly generate lots of sales</span>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="text-left">
         <div class="col-sm-6">
            <div class=" te-0 col-sm-10">

               <p><q>Once you get orders on Unity Mall,
                     you will wonder why all merchants
                     out there don’t use Unity Mall</q><span>-Rahul Rana</span></p>
            </div>
         </div>
         <div class="col-sm-6">
            <div class=" col-sm-10 te-0">
               <p><q>Unity Mall merchant platform is a game
                     changer and how commerce should
                     be conducted in the future.
                  </q><span>-Diksha Gupta</span></p>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- slider close -->

<div class="col-sm-12 sto-0 text-center">
   <h3>Register today to get maximum benefits</h3>
   <a href="<?php echo base_url(); ?>admin/signup">Create Your <span>Unitymall</span> Store Now</a>

</div>

<div class="col-sm-12 footer text-center" id="send-query">
   <div class="container wr">
      <h4>For more Information, feel free to send query</h4>

      <?php
      //flash messages
      if ($this->session->flashdata('send_query')) {
         if ($this->session->flashdata('send_query') == 'updated') {
            echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Thank you!</strong> mail send successfully.';
            echo '</div>';
         }
      }

      //print_r($restaurants);
      ?>
      <?php echo validation_errors(); ?>
      <form method="post" action="<?php echo base_url(); ?>#send-query" class="form-horizontal" role="form">
         <div class="col-sm-4">
            <div class="form-group">

               <label for="firstname" class="control-label">Name</label>
               <input type="text" class="form-control" name="name" required value="<?php if ($this->input->post('name') != '') {
                                                                                       echo $this->input->post('name');
                                                                                    } ?>">

            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">

               <label for="firstname" class="control-label">Email</label>
               <input type="email" required class="form-control" name="email" value="<?php if ($this->input->post('email') != '') {
                                                                                          echo $this->input->post('email');
                                                                                       } ?>">

            </div>
         </div>
         <div class="col-sm-4">
            <div class="form-group">

               <label for="firstname" class="control-label">Subject</label>
               <input type="text" class="form-control" required name="subject" value="<?php if ($this->input->post('subject') != '') {
                                                                                          echo $this->input->post('subject');
                                                                                       } ?>">

            </div>
         </div>

         <div class="col-sm-12">
            <div class="form-group">

               <label for="firstname" class="control-label">Message</label>
               <textarea required class="form-control" name="description"><?php if ($this->input->post('description') != '') {
                                                                              echo $this->input->post('description');
                                                                           } ?></textarea>

            </div>
         </div>

         <div class="form-group text-center">
            <div class="col-sm-12">
               <input type="hidden" class="form-control" name="send_query" value="true">
               <button type="submit" class="btn btn-default">Send Query</button>
            </div>
         </div>

      </form>


   </div>
</div>
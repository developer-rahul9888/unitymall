	<div id="footer">
		
	</div>
	<div style="display:none" class="alert alert-success success-add">
  <strong>OTP Verified Genrate Invoice</strong> 
</div>
	
	
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://code.jquery.com/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
 <script>
  
  $(document).ready(function() {
    $('#example').DataTable();
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
	$( "#datepicker2" ).datepicker();
	$( "#datepicker3" ).datepicker();
	
	
	
	
	  jQuery("#popup-register-form").submit(function( event ) { 
  event.preventDefault();
   jQuery('.popup-register-button').attr("disabled",'');
		jQuery("#register-msg-div").html('<img src="/assets/images/ajax-loader.gif" style="max-width:100%">'); 
		jQuery("#registerLoginModal").animate({ scrollTop: 0 }, "slow");
			   jQuery.ajax({
                   type:"POST",
                   url:"<?php echo base_url(); ?>register",
                   data:jQuery("#popup-register-form").serialize(),
                   success:function(data){
					   if(data.indexOf("Please verify your OTP")!= "-1") { 
					   jQuery(".otp_vrfy").show();
					   jQuery(".snd-otp").hide();
					   jQuery(".verify").show(); 
					   }
					   
					   if(data.indexOf("alert alert-success")== "-1") { jQuery("#register-msg-div").html(data); }
					    
					  
		              else { jQuery("#register-msg-div").html('');
					         jQuery("#login-msg-div").html(data);
					         jQuery("#auth_v").val(data);
							jQuery('.input-empty').val(''); 
							jQuery(".otp_vrfy").hide();
							jQuery("#card_verify").hide();
							jQuery("#show_invoice").show();
							 jQuery('.success-add').show();
					 jQuery(".success-add").css({"position": "fixed", "z-index": "999999", "width": "300px", "height": "30px", "background": "#84C639", "color": "#fff", "padding": "6px 8px", "right": "0%", "bottom": "10%", "border-radius": "5px 0px 0 5px", "font-size": "12px"});
					  setTimeout(function () {
      	             jQuery(".success-add").slideUp(500);
                     }, 2000); 
						} 
						jQuery('.popup-register-button').removeAttr("disabled");
                   }
               });  
  });
	
	jQuery('.remove-btn').on('click',function(){
		 
           var cls = jQuery(this).attr('data');
		   var tree = 2;
		    alert(cls);
			 jQuery.ajax({
                   type:"POST",
                   url:"<?php echo base_url(); ?>index.php/vc_site_admin/sale/unset_session_value",
                   data:{ cls:cls},
                   success:function(){
				  jQuery('#reviews form span input').val(''); 
				  jQuery('#reviews form textarea').val(''); 
                 
					 alert('review submitted successfully');
                   }
               });  
		  
		   
		 
		});		
	
} );
 
  </script>

	
	
	
	
</body>
</html>
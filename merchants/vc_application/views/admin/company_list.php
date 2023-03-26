<?php date_default_timezone_set('America/New_York'); ?>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script type="text/javascript"> 
jQuery(document).ready(function(){
    jQuery('#example').DataTable();
});
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>
 <?php
      //form data
      $attributes = array('class' => 'form form-inline', 'id' => '');

      //form validation
      echo validation_errors();
	  //print_r($editor);
      
      echo form_open('admin/company/', $attributes);
      ?>
<div class="page-heading">

<div class="select-part">
<?php if($this->session->userdata('permission')=='4' || $this->session->userdata('permission')=='3' || $this->session->userdata('permission')=='2') { ?>
<a class="btn btn-primary " href="<?php echo base_url().'admin/company/add'; ?>">Add New</a>
<?php } /* if($this->session->userdata('permission')=='4' || $this->session->userdata('permission')=='3') { ?>
 <select name="type" class="form-control">
  <option value="">Select action</option>
  <option value="Pending">PENDING</option>
  <option value="Complete">ACCEPTED</option>
 </select> 
 <input type="submit" class="btn btn-primary" name="actionForm" value="Apply">
<?php } */ ?>

</div>
        <h2>Companies</h2>
      </div>
 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> company updated successfully.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
	  //print_r($restaurants);
      ?>
 <?php
      //form validation
      echo validation_errors();
	  $rowcount = 5 ;
	    ?>
<table id="example" class="table table-bordered" width="100%" cellspacing="0">
        <thead> <tr> <th>Name</th><th>WAOIC</th> <th>NAIC</th> <th>City, State, Zip</th><th>Delete</th> </tr></tr> </thead> 
<tbody> 
<?php 
	$i = 1;
if(empty($company)) { echo '<tr><td colspan="5">No company</td></tr>'; }
else { 
foreach($company as $con) { 
	echo '<tr><td><a href="'.base_url().'admin/company/edit/'.$con['waoic'].'">'.$con['name'].'</a></td><td>'.$con['waoic'].'</td><td>'.$con['naic'].'</td><td>'.$con['m_address'].'</td> <td> <a class="delete" onclick="javascript:deleteConfirm(\''.base_url().'admin/company/del/'.$con['waoic'].'\');" href="#">Delete</a></td> </tr>';
$i++;
} 
} 
?>

</tbody> 
</table>

</form>
 <?php echo form_close(); ?>
<!--script>
jQuery('document').ready(function(){ 

jQuery('.all-check').click(function(event) {  
  if(this.checked) {
          
jQuery('.all_check').each(function() { this.checked = true;
        });
        }else{
           
jQuery('.all_check').each(function() { this.checked = false;
        });
    }
});
});
</script-->
 
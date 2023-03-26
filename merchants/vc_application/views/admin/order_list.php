<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>

<style>
 .table-striped > tbody > tr.Delivered {background:#5cb85c}
 .table-striped > tbody > tr.Accepted {background:#ec971f}
 .table-striped > tbody > tr.Pending {background:#31b0d5}
 .table-striped > tbody > tr.Cancel {background:#c9302c}
</style>

<div class="page-heading"> 
        <h2>Orders</h2>
      </div>
 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> order updated with success.';
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
      //form data
      $attributes = array('class' => 'form form-inline', 'id' => '');

      //form validation
      echo validation_errors();
	  //print_r($editor);
      
      echo form_open('admin/category/', $attributes);
      ?>
<div class="table-responsive">
<table id="example" class="table table-bordered table-hover category-table table-striped"> 
<thead> <tr> <th>Sr.no.</th><th>OrderID.</th><th>Name</th><th>Amount</th><th>Status</th><th>Date</th><th>View order</th> </tr> </thead> 
<tbody> 
<?php 
$i = 1;
foreach($order as $con){ 
	
	echo '<tr class='.$con['status'].'><td>'.$i.'</td>
	<td>'.$con['order_id'].'</td>
	<td><a href="'.base_url().'admin/order/'.$con['order_id'].'">'.$con['name'].'</a></td>
	<td>'.$con['tprice'].'</td>
	<td>'.$con['status'].'</td><td>'.$con['date'].'</td>';
?>
	
<td><a class="delete" href="<?php echo base_url().'admin/order/'.$con['order_id'] ;?> ">View</a></td>
		<?php echo '</tr>';
$i++;
}
?>
</tbody> 
</table>
</div>
 <?php echo form_close(); ?>
 
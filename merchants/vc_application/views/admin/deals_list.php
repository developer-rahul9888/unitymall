<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>
<div class="page-heading">
<a class="btn btn-primary flr" href="<?php echo base_url().'admin/deals/add'; ?>">Add New</a>
        <h2>Deals</h2>
      </div>
 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> deals updated successfully.';
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
      
      echo form_open('admin/deals/', $attributes);
      ?>
<table class="table table-bordered table-hover deals-table"> 
<thead> <tr> <th>Image</th><th>Title</th><th>Status</th><th>Delete</th> </tr> </thead> 
<tbody> 
<?php 
$i = 1;
foreach($deals as $con){ 
	
	echo '<tr><td><a href="'.base_url().'admin/deals/edit/'.$con['id'].'">';
	if($con['image']!='') { echo '<img src="'.base_url().'images/deals/'.$con['image'].'" width="60">'; }
	echo '</a></td><td><a href="'.base_url().'admin/deals/edit/'.$con['id'].'">'.$con['title'].'</a></td><td>'.$con['status'].'</td>';
?>
	
<td><a class="delete" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/deals/del/'.$con['id'];?>');" deleteConfirm href="#">Delete</a></td>
		<?php echo '</tr>';
$i++;
}
?>
</tbody> 
</table>
</form>
<?php echo form_close(); ?>
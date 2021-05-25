<?php
require('db.php');





if (isset($_REQUEST['section'])) {
  $section_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $intercom_no = mysqli_real_escape_string($conn, $_REQUEST['intercom_no']);
  $type_of_section = mysqli_real_escape_string($conn, $_REQUEST['type_of_section']);


  $update_query="update section set section_id='$section_id',section_name='$name',intercom_no='$intercom_no',type_of_section='$type_of_section' where section_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Section Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from section where section_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>






<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE SECTION</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">SECTION ID</label>
		<input type="text" name="id" value="<?php echo @$res['section_id'];?>" class="form-control">
		<label class="mt-3">SECTION NAME</label>
		<input type="text" name="name" value="<?php echo @$res['section_name'];?>" class="form-control">
		<label class="mt-3">SECTION INTERCOM_NO</label>
		<input type="text" name="intercom_no" value="<?php echo @$res['intercom_no'];?>" class="form-control">
		<label class="mt-3">SECTION TYPE</label>
		<input type="text" name="type_of_section" value="<?php echo @$res['type_of_section'];?>" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="section">UPDATE</button>
	</form>
</div>

<?php
require('db.php');

if (isset($_REQUEST['staff'])) {

  $staff_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $staff_name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $section_name = mysqli_real_escape_string($conn, $_REQUEST['section_name']);

  $update_query="update staff set id='$staff_id', name='$staff_name',designation='$designation',mobileno='$mobileno' , section_name='$section_name' where staff_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Staff Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from staff where staff_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  

?>


<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>UPDATE STAFF</h3>
		 <?php 
    echo @$err;

    ?>
		<label class="mt-3">STAFF ID</label>
		<input type="text" name="id" value="<?php echo @$res['staff_id'];?>" class="form-control">
		<label class="mt-3">STAFF NAME</label>
		<input type="text" name=“name” value="<?php echo @$res['staff_name'];?>" class="form-control">
		<label class="mt-3">DESIGNATION</label>
		<input type="text" name="designation" value="<?php echo @$res['designation'];?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
		<label class="mt-3">SECTION NAME</label>
		<input type="text" name="section_name" value="<?php echo @$res['section_name'];?>" class="form-control">

		<button class="btn btn-dark mt-3" type="submit" name="staff">UPDATE</button>
	</form>
</div>

<?php
require('db.php');



if (isset($_REQUEST['client'])) {

  $client_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $date_of_signing = mysqli_real_escape_string($conn, $_REQUEST['date_of_signing']);
   $type_of_partnership = mysqli_real_escape_string($conn, $_REQUEST['type_of_partnership']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
   $date_of_expiry = mysqli_real_escape_string($conn, $_REQUEST['date_of_expiry']);

  



  $update_query="update client set client_id='$client_id',name='$name',date_of_signing='$date_of_signing',type_of_partnership='$type_of_partnership',mobileno='$mobileno', date_of_expiry='$date_of_expiry ' where client_id='".$_GET['id']."'";
  $update_sql=mysqli_query($conn,$update_query);
  $err="<div class='alert alert-success'><b>Client Area Details updated</b></div>";
}
$con=mysqli_query($conn,"select * from client where client_id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);  



?>

<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>UPDATE CLIENT</h3></div>
		 <?php  
    echo @$err;

    ?>
		<label class="mt-3">CLIENT ID</label>
		<input type="text" name="id" value="<?php echo @$res['client_id'];?>" class="form-control">
		<label class="mt-3">CLIENT NAME</label>
		<input type="text" name="name" value="<?php echo @$res['name'];?>" class="form-control">
		<label class="mt-3">DATE_OF_SIGNING</label>
		<input type="text" name="date_of_signing" value="<?php echo @$res['date_of_signing'];?>" class="form-control">
	
		<label class="mt-3">TYPE_OF_PARTNERSHIP</label>
		<input type="text" name="type_of_partnership" value="<?php echo @$res['type_of_partnership'];?>" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" value="<?php echo @$res['mobileno'];?>" class="form-control">
		<label class="mt-3">DATE_OF_EXPIRY</label>
		<input type="text" name="date_of_expiry" value="<?php echo @$res['date_of_expiry'];?>" class="form-control">

		<button class="btn btn-dark mt-3" type="submit" name="client">UPDATE</button>
	</form>
</div>

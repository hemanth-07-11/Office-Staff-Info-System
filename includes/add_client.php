<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['client'])) {

  $client_id = mysqli_real_escape_string($conn, $_REQUEST['id']);
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $date_of_signing = mysqli_real_escape_string($conn, $_REQUEST['date_of_signing']);
  $type_of_partnership = mysqli_real_escape_string($conn, $_REQUEST['type_of_partnership']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $revenue = mysqli_real_escape_string($conn, $_REQUEST['revenue']);
  $staff_id = mysqli_real_escape_string($conn, $_REQUEST['staff_id']);
  $date_of_expiry = mysqli_real_escape_string($conn, $_REQUEST['date_of_expiry']);


  
  
  $user_check_query = "SELECT * FROM client WHERE client_id='$client_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['client_id'] === $client_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO client (client_id,name,date_of_signing, type_of_partnership,mobileno,revenue,staff_id,date_of_expiry) 
          VALUES('$client_id','$name','$date_of_signing','$type_of_partnership','$mobileno','$revenue','$staff_id',’$date_of_expiry)";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Client added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Client not added</b></div>";
    }
  }
}



?>


<div class="container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD CLIENT</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">CLIENT ID</label>
		<input type="text" name="id" class="form-control">
		<label class="mt-3">CLIENT NAME</label>
		<input type="text" name="name" class="form-control">
		<label class="mt-3">DATE_OF_SIGNING</label>
		<input type="text" name="date_of_signing" class="form-control">
		<label class="mt-3">TYPE_OF_PARTNERSHIP</label>
		<input type="text" name="type_of_partnership" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
		<label class="mt-3">REVENUE REQUIRED FOR</label>
		<input type="text" name="revenue" class="form-control">
		<label class="mt-3">STAFF ID</label>
		<input type="text" name="staff_id" class="form-control">
	          <label class="mt-3">DATE OF EXPIRY</label>
		<input type="text" name="date_of_expiry" class="form-control">

		<button class="btn btn-dark mt-3" type="submit" name="client">ADD</button>
	</form>
</div>

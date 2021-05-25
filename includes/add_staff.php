<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['staff'])) {

  $staff_id = mysqli_real_escape_string($conn, $_REQUEST['staff_id']);
  $staff_name = mysqli_real_escape_string($conn, $_REQUEST['staff_name']);
  $designation = mysqli_real_escape_string($conn, $_REQUEST['designation']);
  $mobileno = mysqli_real_escape_string($conn, $_REQUEST['mobileno']);
  $revenue = mysqli_real_escape_string($conn, $_REQUEST['revenue']);
  $section_name = mysqli_real_escape_string($conn, $_REQUEST['section_name']);
  
  
  $user_check_query = "SELECT * FROM staff WHERE staff_id='$staff_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['staff_id'] === $staff_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }


  if (count($errors) == 0) {
  

    $query = "INSERT INTO staff (staff_id,staff_name,designation,mobileno,revenue,section_name) 
          VALUES('$staff_id','$staff_name','$designation','$mobileno','$revenue','$section_name')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>Staff added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>Staff not added</b></div>";
    }
  }
}


?>


<div class="container">
	<form class="mt-3 form-group" method="post" action="">
		<h3>ADD STAFF</h3>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">STAFF ID</label>
		<input type="text" name="staff_id" class="form-control">
		<label class="mt-3">STAFF_NAME</label>
		<input type="text" name="staff_name" class="form-control">
		<label class="mt-3">DESIGNATION</label>
		<input type="text" name="designation" class="form-control">
		<label class="mt-3">MOBILE NO</label>
		<input type="text" name="mobileno" class="form-control">
		<label class="mt-3">PAYMENT AREA ID</label>
		<input type="text" name="revenue" class="form-control">
		<label class="mt-3">SECTION NAME</label>
		<input type="text" name="section_name" class="form-control">
		<button class="btn btn-dark mt-3" type="submit" name="staff">ADD</button>
	</form>
</div>

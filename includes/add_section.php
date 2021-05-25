<?php

require('db.php');

$errors = array(); 
if (isset($_REQUEST['section'])) {

  $section_id = mysqli_real_escape_string($conn, $_REQUEST['section_id']);
  $section_name = mysqli_real_escape_string($conn, $_REQUEST['section_name']);
  $intercom_no = mysqli_real_escape_string($conn, $_REQUEST['intercom_no']);
  $type_of_section = mysqli_real_escape_string($conn, $_REQUEST['type_of_section']);
  
  $user_check_query = "SELECT * FROM section WHERE section_id='$section_id' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['section_id'] === $section_id) {
      array_push($errors, "<div class='alert alert-warning'><b>ID already exists</b></div>");
    }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO section (section_id,section_name,intercom_no,type_of_section) 
          VALUES('$section_id','$section_name','$intercom_no','$type_of_section')";
    $sql=mysqli_query($conn, $query);
    if ($sql) {
    $msg="<div class='alert alert-success'><b>section added successfully</b></div>";
    }else{
      $msg="<div class='alert alert-warning'><b>section not added</b></div>";
    }
  }
}

?>

<div class="w3-container">
	<form class="form-group mt-3" method="post" action="">
		<div><h3>ADD SECTION</h3></div>
		 <?php include('errors.php'); 
    echo @$msg;

    ?>
		<label class="mt-3">SECTION ID</label>
		<input type="text" name="section_id" class="form-control">
		<label class="mt-3">SECTION NAME</label>
		<input type="text" name="section_name" class="form-control">
		<label class="mt-3">SECTION INTERCOM_NO</label>
		<input type="text" name="intercom_no" class="form-control">
		<label class="mt-3">SECTION TYPE</label>
		<select name="type_of_section" class="form-control mt-3">
    <option value="RESEARCH">RESEARCH</option>
    <option value="PENSION">PENSION</option>
    <option value="ESTABLISHMENT">ESTABLISHMENT</option>  
    <option value="SALARY">SALARY</option>  
   <option value="PURCHASE">PURCHASE</option>  
   <option value="FINANCE">FINANCE</option>  
  <option value="AFFILIATION">AFFILIATION</option>  
  <option value="ADMISSION">ADMISSION</option>  





    </select>
		<button class="btn btn-dark mt-3" type="submit" name="section">ADD</button>
	</form>
</div>

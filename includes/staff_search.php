<?php
require('db.php');

$staff_name="";

if (isset($_POST['staff_name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Staff_name</th>";
	echo "<th>Designation</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Section_Name</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$staff_name=$_POST['staff_name'];


		$que=mysqli_query($conn,"SELECT * FROM `staff` WHERE CONCAT(`staff_id`,`staff_name`,`designation`,`mobileno`,'section_name') LIKE '%".$staff_name."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['staff_name']."</td>";
		echo "<td>".$row['designation']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['section_name']."</td>";
		echo "<td><a href='home.php?id=$row[staff_id]&info=update_staff'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[staff_id]&info=delete_staff'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}

	
?>


<?php
require('db.php');


$name="";


if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Section_Id</th>";
	echo "<th>Section_Name</th>";
	echo "<th>Intercom_no</th>";
	echo "<th>Type Of Section</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"SELECT * FROM `section` WHERE CONCAT(`section_id`,`section_name`,`intercom_no`,`type_of_section`) LIKE '%".$name."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['section_id']."</td>";
		echo "<td>".$row['section_name']."</td>";
		echo "<td>".$row['intercom_no']."</td>";
		echo "<td>".$row['type_of_section']."</td>";
		echo "<td><a href='home.php?id=$row[section_id]&info=update_section'><i class='fas fa-pencil-alt'></i></a></td>";
		echo  "<td><a href='home.php?id=$row[section_id]&info=delete_section'><i class='fas fa-trash-alt'></i></a></td>";
		echo "</tr>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}


	
?>

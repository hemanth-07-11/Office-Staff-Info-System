<?php
require('db.php');
$name="";
if (isset($_POST['name'])) {
	echo "<div class='container'>";
	echo "<table class='table table-bordered  table-hover mt-3'>";
	echo "<tr>";
	echo "<th>Client_Id</th>";
	echo "<th>Name</th>";
	echo "<th>Date_of_signing</th>";
	echo "<th>Type_of_partnership</th>";
	echo "<th>Mobile No</th>";
	echo "<th>Date_of_expiry</th>";
	echo "<th>Update</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	echo "</div>";


	$name=$_POST['name'];


		$que=mysqli_query($conn,"SELECT * FROM `client` WHERE CONCAT(`client_id`,`name`,`date_of_signing`,`type_of_partnership`,'revenue','mobileno','date_of_expiry') LIKE '%".$name."%'");
		if(mysqli_num_rows($que) > 0){
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$row['client_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['date_of_signing']."</td>";
		echo "<td>".$row['type_of_partnership']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['date_of_expiry']."</td>";


		echo "<td><a href='home.php?id=$row[client_id]&info=update_client'><i class='fas fa-pencil-alt' ></i></a></td>";
		echo  "<td><a href='home.php?id=$row[client_id]&info=delete_client'><i class='fas fa-trash-alt'></i></a></td>";

	}
}else{
	echo "<div class='alert alert-warning'><b>0 result</b></div>";
}
	
}




	
?>

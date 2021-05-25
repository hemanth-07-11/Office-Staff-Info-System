<?php
require('db.php');


$inf=$_GET['id'];


$sql_client="DELETE FROM client WHERE staff_id=(select staff_id from staff where revenue=(select revenue from payment where revenue='$inf'))";
$sql_query_mem=mysqli_query($conn,$sql_client);


if ($sql_query_mem) {
$sql_staff="DELETE FROM staff WHERE revenue=(select revenue from payment where revenue='$inf' )";
	$sql_query_staff=mysqli_query($conn,$sql_staff);
}else
{
	echo "Not deleted";
}

	

	if ($sql_query_staff) {


	$sql_query="DELETE FROM payment WHERE revenue='$inf'";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		header("location:home.php?info=manage_payment");
	}else{
		echo "error".mysqli_error($conn);
	}
	
	}else{
		echo "Not deleted".mysqli_error($conn);
	}



	
?>

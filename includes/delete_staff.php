<?php
require('db.php');

$inf=$_GET['id'];

$sql_client="DELETE FROM client WHERE staff_id=(select staff_id from staff where staff_id='$inf')";
$sql_query_client=mysqli_query($conn,$sql_client);
if ($sql_query_client) {


	$sql_query="DELETE FROM staff WHERE staff_id='$inf'";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		header("location:home.php?info=manage_staff");
	}else{
		echo "error".mysqli_error($conn);
	}
	
}else{
	echo "Not deleted";
}
	
?>

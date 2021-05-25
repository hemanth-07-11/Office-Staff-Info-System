<?php
require('db.php');


$inf=$_GET['id'];


$sql_client="DELETE FROM client WHERE staff_id=(select staff_id from staff where revenue=(select revenue from payment where section_id=(select section_id from section where section_id='$inf')))";
$sql_query_mem=mysqli_query($conn,$sql_client);

if ($sql_query_mem) {
	$sql_staff="DELETE FROM staff where revenue=(select revenue from payment where section_id=(select section_id from section where section_id='$inf'))";

	$sql_query_staff=mysqli_query($conn,$sql_staff);
}else{
	echo "not deleted";
}



if ($sql_query_staff) {
	$sql_payment="DELETE FROM payment WHERE section_id=(select section_id from section where section_id='$inf')";
	$sql_querypayment=mysqli_query($conn,$sql_payment);
}else{
	echo "not deleted".mysqli_error($conn);
}


if ($sql_querypayment) {
	$sql_query="DELETE FROM section WHERE section_id='$inf'";
	$delete=mysqli_query($conn,$sql_query);
	if ($delete) {
		header("intercom_no:home.php?info=manage_section");
	}else{
		echo "error".mysqli_error($conn);
	}
}else{
	echo "not delete".mysqli_error($conn);
}
	
	
	
	
?>

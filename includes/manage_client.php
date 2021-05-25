

<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=client_search">
		<h3 class="lead">SEARCH CLIENT</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER CLIENT NAME OR CLIENT ID">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>CLIENT ID</th>
				<th>CLIENT NAME</th>
				<th>DATE_OF_SIGNING</th>
				<th>TYPE_OF_PARTNERSHIP</th>
				<th>MOBILE NO</th>
				<th>REVENUE FOR </th>
				<th>STAFF ID</th>
<th>DATE_OF_EXPIRY</th>

			</tr>
			<?php
           require('db.php');


$all="SELECT * FROM client";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
		echo "<td>".$row['client_id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['date_of_signing']."</td>";
		echo "<td>".$row['type_of_partnership']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['revenue']."</td>";
		echo "<td>".$row['staff_id']."</td>";
echo "<td>".$row['date_of_expiry']."</td>";
	   echo "</tr><br>";
    }
} else {
    echo "0 results";
}



?>
			
		</table>
	</div>
</div>

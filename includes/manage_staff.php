
<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=staff_search">
		<h3 class="lead">SEARCH KEY</h3>
		<input type="text" name="staff_name" class="form-control" placeholder="ENTER STAFF NAME / SECTION NAME / DESIGNATION">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>STAFF ID</th>
				<th>STAFF_NAME</th>
				<th>DESIGNATION</th>
				<th>MOBILE NO</th>
				<th>SECTION NAME</th>

			</tr>
			<?php
           require('db.php');


$all="SELECT * FROM staff";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
			echo "<td>".$row['staff_id']."</td>";
		echo "<td>".$row['staff_name']."</td>";
		echo "<td>".$row['designation']."</td>";
		echo "<td>".$row['mobileno']."</td>";
		echo "<td>".$row['section_name']."</td>";
		echo "</tr><br>";
    }
} else {
    echo "0 results";
}



?>
			
		</table>
	</div>
</div>

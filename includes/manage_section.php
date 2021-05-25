<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=section_search">
		<h3 class="lead">SEARCH KEY</h3>
		<input type="text" name="name" class="form-control" placeholder="ENTER NAME / INTERCOM / SECTION TYPE">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>SECTION ID</th>
				<th>SECTION NAME</th>
				<th>SECTION INTERCOM</th>
				<th>SECTION TYPE</th>
			</tr>
			<?php
           require('db.php');

$all="SELECT * FROM section";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
		echo "<td>".$row['section_id']."</td>";
		echo "<td>".$row['section_name']."</td>";
		echo "<td>".$row['intercom_no']."</td>";
		echo "<td>".$row['type_of_section']."</td>";
		echo "</tr><br>";
    }
} else {
    echo "0 results";
}

?>
		</table>
	</div>
</div>
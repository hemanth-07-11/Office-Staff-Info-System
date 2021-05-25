<div class="container">
	<form class="form-group mt-3" method="post" action="home.php?info=payment_search">
		<h3 class="lead">SEARCH KEY</h3>
		<input type="text" name="id" class="form-control" placeholder="ENTER NAME FOR WHICH PAYMENT PROVIDED FOR">
	</form>

	<div class="container">
		<table class="table table-bordered table-hover">
			<tr>
				<th>PAYMENT FOR</th>
				<th>AMOUNT</th>
				<th>SECTION ID</th>
			</tr>
			<?php
           require('db.php');

$all="SELECT * FROM payment";
$all_query=mysqli_query($conn,$all);
if (mysqli_num_rows($all_query) > 0) {
    while($row = mysqli_fetch_assoc($all_query)) {
       echo "<tr>";
			echo "<td>".$row['revenue']."</td>";
			echo "<td>".$row['amount']."</td>";
			echo "<td>".$row['section_id']."</td>";
		echo "</tr><br>";
    }
} else {
    echo "0 results";
}

?>
			
		</table>
	</div>
</div>
	

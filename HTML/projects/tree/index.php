<?php 
	// create connection
$conn = mysqli_connect('localhost','Will','?B%5CV4@n$firvA','tree');

	// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Tree - Final Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    	<!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body>


	<!-- Toggle inputs, show table with edit and delete options -->
	<div class="container">
  		<div class="row">
  			<h1>Village of Ada Tree Database</h1>
  			<div class="card">
  				<div class="card-body">
  					<button type="button" class="btn btn-success" name="add">
  						<a href="form.php" style="color:inherit;">Add</a>
  					</button>
  					<table class="table" border="1">
				<thead>
					<th scope="col">Tree ID</th>
					<th scope="col">Common Name</th>
					<th scope="col">Address</th>
					<th scope="col">Date</th>
					<th scope="col"></th>
				</thead>
				<tbody>
					<?php
					$query=mysqli_query($conn,"SELECT trees.IDTree AS ID, species.`Common Name` AS CN, locations.StreetAddress AS SA, treemetrics.Date AS DA FROM trees, species, locations, treemetrics WHERE species.IDSpecies = trees.SpeciesID AND locations.IDLocation = trees.LocationID AND treemetrics.TreeID = trees.IDTree;");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<th><?php echo $row['ID']; ?></th>
							<td><?php echo $row['CN']; ?></td>
							<td><?php echo $row['SA']; ?></td>
							<td><?php echo $row['DA']; ?></td>							

							<td>
								<a href="maintenance.php?id=<?php echo $row['ID']; ?>"> Maintenance</a>
								<a href="edit.php?id=<?php echo $row['ID']; ?>">Edit</a>
								<a href="delete.php?id=<?php echo $row['ID']; ?>">Delete</a>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
  				</div>
  			</div>
			
		</div>
	</div>
	<!-- JS Files -->
	<!-- <script type="text/javascript" src="scripts.js"></script> -->
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
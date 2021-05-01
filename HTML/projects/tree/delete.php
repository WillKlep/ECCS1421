<?php

// use connection from index.php
	include('index.php');

	// get ID from link
	$id = $_GET['id'];

	// get needed location and species IDs 
	$query = mysqli_query($conn,"SELECT trees.SpeciesID AS SPE, trees.LocationID AS LOC FROM trees WHERE trees.IDTree = $id");

	while($row=mysqli_fetch_array($query)){
		$spe = $row['SPE'];
		$loc = $row['LOC'];
	}

	// disable foreign key checks to delete
	mysqli_query($conn,"SET FOREIGN_KEY_CHECKS = OFF");

	// delete obstruction
	if(!mysqli_query($conn, "DELETE FROM locationobstructions WHERE LocationID = $loc")) {
		echo ("Delete Error locationobstructions " . $conn->error);
	}

	// delete restriction
	if(!mysqli_query($conn, "DELETE FROM locationrestrictions WHERE LocationID = $loc")) {
		echo ("Delete Error locationrestrictions " . $conn->error);
	}

	// delete location - loc
	if(!mysqli_query($conn, "DELETE FROM locations WHERE IDLocation = $loc")) {
		echo ("Delete Error locations " . $conn->error);
	}

	// delete metrics - tree
	if(!mysqli_query($conn, "DELETE FROM treemetrics WHERE TreeID = $id")) {
		echo ("Delete Error treemetrics " . $conn->error);
	}

	// delete species - spe - NOT WORKING
	if(!mysqli_query($conn, "DELETE FROM species WHERE IDSpecies = $spe")) {
		echo ("Delete Error species " . $conn->error);
	}

	// delete maintenancedetails - tree
	if(!mysqli_query($conn, "DELETE FROM maintenancedetails WHERE TreeID = $id")) {
		echo ("Delete Error treemetrics " . $conn->error);
	}

	// delete tree - tree
	if(!mysqli_query($conn,"DELETE FROM trees WHERE IDTree = $id" )) {
		echo ("Delete Error trees " . $conn->error);
	}

	// enable foreign key checks
	mysqli_query($conn,"SET FOREIGN_KEY_CHECKS = ON");

	
?>
<!-- HTML used for redirect since PHP's header isn't allowing
	 my code to execute -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="refresh" content="0;url=index.php">
</head>
<body>

</body>
</html>
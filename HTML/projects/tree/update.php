<?php
	include('index.php');
	// id from link

	$id=$_GET['id'];
	//$id='11';
 
	// species
	$commonName = $_POST['commonName'];
	$sciName = $_POST['sciName'];

	// treeMetrics
	$date = $_POST['date'];
	$circumference = $_POST['circumference'];
	$height = $_POST['height'];

	// location
	$address = $_POST['address'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];

	$obstruction = $_POST['obstruction'];

	$restriction = $_POST['restriction'];

	// get needed location and species IDs 
	$query = mysqli_query($conn,"SELECT trees.SpeciesID AS SPE, trees.LocationID AS LOC FROM trees WHERE trees.IDTree = $id");

	while($row=mysqli_fetch_array($query)){
		$spe = $row['SPE'];
		$loc = $row['LOC'];
	}

		/* Update tables */

		// update species
		mysqli_query($conn, "UPDATE species SET `Common Name`='$commonName',`Scientific Name` = '$sciName' WHERE IDSpecies = '$spe'");

		// update treeMetrics - date, cir, height
		mysqli_query($conn, "UPDATE treeMetrics SET `Date`='$date', `CircumferenceInInches` = '$circumference', `HeightInFeet` = '$height' WHERE TreeID = '$id'");

		// update locations - SA, lat, long 
		mysqli_query($conn, "UPDATE locations SET `StreetAddress` = '$address', `Lat` = '$lat', `Long` = '$long' WHERE IDLocation = '$loc'");

		// update obstruction
		mysqli_query($conn, "UPDATE locationobstructions SET `Obstruction` = '$obstruction' WHERE LocationID = '$loc'");
		// update restriction
		mysqli_query($conn, "UPDATE locationrestrictions SET `Restriction` = '$restriction' WHERE LocationID = '$loc'");

	header("location:index.php");
?>
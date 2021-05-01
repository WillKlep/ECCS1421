<?php
	include('index.php');
 
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

	// species query - works
	if(!mysqli_query($conn,"insert into `species` (`Common Name`,`Scientific Name`) values ('$commonName','$sciName')")){
		echo ("Insert Error species" . $conn->error);
	}
	// used to retrieve newly added IDSpecies
	$newIDSpecies = mysqli_insert_id($conn);


	// locations query - works
	if(!mysqli_query($conn,"insert into `locations` (`StreetAddress`,`Lat`,`Long`) values ('$address','$lat','$long')")){
		echo ("Insert Error -locations" . $conn->error);
	}
	// used to retrieve newly added IDLocation
	$newIDLocation = mysqli_insert_id($conn);

	// tree query - works
	if(!mysqli_query($conn,"insert into `trees` (`SpeciesID`,`LocationID`) values ('$newIDSpecies','$newIDLocation')")){
		echo ("Insert error - trees".$conn->error);
	}

	$newIDTree = mysqli_insert_id($conn);

	// tree metrics query - works
	if(!mysqli_query($conn,"insert into `treemetrics` (`Date`,`CircumferenceInInches`,`HeightInFeet`,`TreeID`) values ('$date','$circumference','$height','$newIDTree')")){
		echo ("Insert Error treemetrics" . $conn->error);
	}
	
	// obstruction query - works
	if(!mysqli_query($conn,"insert into `locationobstructions` (`Obstruction`,`LocationID`) values ('$obstruction','$newIDLocation')")){
		echo ("Insert Error - obstruction" . $conn->error);
	}
	
	// restrictions query - works
	mysqli_query($conn,"insert into `locationrestrictions` (`Restriction`,`LocationID`) values ('$restriction','$newIDLocation')");

	// redirect to home
	header('location:index.php');
 
?>
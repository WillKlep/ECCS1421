<?php 

	include('index.php');

	$id = $_GET['id'];

	// worker table
	$workerName = $_POST['workerName'];
 
 	// species
	$description = $_POST['description'];
	$date = $_POST['date'];


	// species query - works
	if(!mysqli_query($conn,"insert into `workers` (`Name`) values ('$workerName')")){
		echo ("Insert Error workers" . $conn->error);
	}
	$newIDWorker = mysqli_insert_id($conn);

	if (!mysqli_query($conn,"insert into `maintenancedetails` (TreeID,Date, Description, WorkerID) values ('$id','$date','$description','$newIDWorker')")) {
		echo ("Insert Error maintenancedetails" . $conn->error);
	}

	if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

?>
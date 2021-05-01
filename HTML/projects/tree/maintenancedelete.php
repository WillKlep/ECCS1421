<?php 
include('index.php');

	$id=$_GET['id'];

	mysqli_query($conn, "DELETE FROM maintenancedetails WHERE maintenancedetails.MaintenanceDetailID = $id");
	// go back to maintence
	if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
?>
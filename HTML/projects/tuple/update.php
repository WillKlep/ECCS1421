<?php
	include('index.php');
	$id=$_GET['id'];
 
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
 
	mysqli_query($conn,"UPDATE `user` SET firstname='$firstname', lastname='$lastname' WHERE userid='$id'");
	header('location:index.php');
?>
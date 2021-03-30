<?php 
	// create connection
$conn = mysqli_connect('localhost','Will','?B%5CV4@n$firvA','tuple');

	// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if(array_key_exists('button1', $_POST)) {
	button1($conn);
}

function button1(mysqli $conn) {
	$sql = "CREATE TABLE IF NOT EXISTS `user` (
	`userid` INT(11) NOT NULL AUTO_INCREMENT,
	`firstname` VARCHAR(30) NOT NULL,
	`lastname` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`userid`)
)";

$result = mysqli_query($conn,$sql) or die("Bad create $sql");
}

$search = $_GET["search"];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tuple</title>
</head>
<body>

	<!-- Auto generate table -->
	<form method="post">
		<input type="submit" name="button1" class="button" value="Create new table"/>
	</form>

	<button onclick="showHide()">Show/Hide table</button>

	<!-- Toggle inputs, show table with edit and delete options -->
	<div id="showDB">
		<!-- input form -->
		<form class="inputForm" method="POST" action="add.php">
			<label>First Name:</label><input type="text" name="firstname">
			<label>Last Name:</label><input type="text" name="lastname">
			<input type="submit" name="add">
		</form>
		<br>
		<!-- search form -->
		<form action="search.php">
			<input type="text" name="search">
			<input onclick="show()" type="submit" value="search">
		</form>
		<!-- Show table -->
		<br>
		<table border="1">
			<thead>
				<th>First Name</th>
				<th>Last Name</th>
				<th></th>
			</thead>
			<tbody>
				<?php
				$query=mysqli_query($conn, $search);
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['userid']; ?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['userid']; ?>">Delete</a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript" src="searchScripts.js"></script>
</body>
</html>
<?php
	include('index.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"SELECT species.`Common Name` AS CN,species.`Scientific Name`AS SN, treemetrics.Date AS DA, treemetrics.CircumferenceInInches AS CIR, treemetrics.HeightInFeet AS HEIGHT, locations.StreetAddress AS SA, locations.Lat AS LAT, locations.Long AS LONGI, locationobstructions.Obstruction AS OB, locationrestrictions.Restriction AS RE FROM trees,species,locations,treemetrics,locationobstructions,locationrestrictions WHERE trees.IDTree = $id AND species.IDSpecies = trees.SpeciesID AND locations.IDLocation = trees.LocationID AND treemetrics.TreeID = trees.IDTree AND locationobstructions.LocationID = trees.LocationID AND locationrestrictions.LocationID = trees.LocationID");
	$rows=mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Entry</title>
</head>
<body>
	<!-- <form method="POST" action="update.php?id=<?php// echo $id; ?>">
		<label>Firstname:</label><input type="text" value="<?php// echo $row['']; ?>" name="firstname">
		
		<input type="submit" name="submit">
		<a href="index.php">Back</a>
	</form> -->

	<div class="container">
  		<div class="row">
  			<?php foreach ($rows as $row) { ?>
  			
  			
  			<h1>Edit Tree</h1>
  			<div class="card">
  				<div class="card-body">
  					<form class="inputFormEdit" method="POST" action="update.php?id=<?php echo $id; ?>">
  						<div class="form-group">
  							<label for="commonName"><strong>Common Name</strong></label>
  							<br>
  							<input type="text" name="commonName" placeholder="Oak" value="<?php echo $row['CN'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="sciName"><strong>Scientific Name</strong></label>
  							<br>
  							<input type="text" name="sciName" placeholder="Quercus" value="<?php echo $row['SN'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="date"><strong>Date</strong></label>
  							<br>
  							<input type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $row['DA'] ?>">
  						</div>
  						<div class="form-group">
  							<label for="circumference"><strong>Circumference</strong></label>
  							<br>
  							<input type="text" name="circumference" placeholder="Circumference (in.)" value="<?php echo $row['CIR'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="height"><strong>Height</strong></label>
  							<br>
  							<input type="text" name="height" placeholder="Height (ft.)" value="<?php echo $row['HEIGHT'] ?>" required>
  						</div>

  						<div class="form-group">
  							<label for="address"><strong>Address</strong></label>
  							<br>
  							<input type="text" name="address" placeholder="525 S Main Street" value="<?php echo $row['SA'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="lat"><strong>Latitude</strong></label>
  							<br>
  							<input type="text" name="lat" placeholder="40.765490" value="<?php echo $row['LAT'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="long"><strong>Longitude</strong></label>
  							<br>
  							<input type="text" name="long" placeholder="-83.824210" value="<?php echo $row['LONGI'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="obstruction"><strong>Obstruction</strong></label>
  							<br>
  							<input type="text" name="obstruction" placeholder="Obstruction" value="<?php echo $row['OB'] ?>" required>
  						</div>
  						<div class="form-group">
  							<label for="restriction"><strong>Restriction</strong></label>
  							<br>
  							<input type="text" name="restriction" placeholder="Restriction" value="<?php echo $row['RE'] ?>" required>
  						</div>
  						<br>
  						<button class="btn btn-success" name="update">Update</button>
  					</form>
  				</div>
  			</div>
  			<?php } ?>
  		</div>
  	</div>
</body>
</html>
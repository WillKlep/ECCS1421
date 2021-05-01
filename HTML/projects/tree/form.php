<!DOCTYPE html>
<html>
<head>
	<title>Add New Entry</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body>

	<div class="container">
  		<div class="row">
  			<h1>Add a New Tree</h1>
  			<div class="card">
  				<div class="card-body">
  					<form class="inputForm" method="POST" action="add.php">
  						<div class="form-group">
  							<label for="commonName"><strong>Common Name</strong></label>
  							<br>
  							<input type="text" name="commonName" placeholder="Oak" required>
  						</div>
  						<div class="form-group">
  							<label for="sciName"><strong>Scientific Name</strong></label>
  							<br>
  							<input type="text" name="sciName" placeholder="Quercus" required>
  						</div>
  						<div class="form-group">
  							<label for="date"><strong>Date</strong></label>
  							<br>
  							<input type="text" name="date" placeholder="YYYY-MM-DD" required>
  						</div>
  						<div class="form-group">
  							<label for="circumference"><strong>Circumference</strong></label>
  							<br>
  							<input type="text" name="circumference" placeholder="Circumference (in.)" required>
  						</div>
  						<div class="form-group">
  							<label for="height"><strong>Height</strong></label>
  							<br>
  							<input type="text" name="height" placeholder="Height (ft.)" required>
  						</div>

  						<div class="form-group">
  							<label for="address"><strong>Address</strong></label>
  							<br>
  							<input type="text" name="address" placeholder="525 S Main Street" required>
  						</div>
  						<div class="form-group">
  							<label for="lat"><strong>Latitude</strong></label>
  							<br>
  							<input type="text" name="lat" placeholder="40.765490" required>
  						</div>
  						<div class="form-group">
  							<label for="long"><strong>Longitude</strong></label>
  							<br>
  							<input type="text" name="long" placeholder="-83.824210" required>
  						</div>
  						<div class="form-group">
  							<label for="obstruction"><strong>Obstruction</strong></label>
  							<br>
  							<input type="text" name="obstruction" placeholder="Obstruction" required>
  						</div>
  						<div class="form-group">
  							<label for="restriction"><strong>Restriction</strong></label>
  							<br>
  							<input type="text" name="restriction" placeholder="Restriction" required>
  						</div>
  						<button class="btn btn-success" name="add">Submit</button>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>	

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
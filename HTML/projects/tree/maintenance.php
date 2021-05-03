<?php 
	// create connection
	$conn = mysqli_connect('localhost','Will','?B%5CV4@n$firvA','tree');

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
}

$id=$_GET['id'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Maintenance</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="myCSS.css">
</head>
<body>

  <!-- Table for current records -->
  <div class="container">
  		<div class="row">
  			<h1>Records for Current Tree</h1>
  			<div class="card">
  				<div class="card-body">
				  <table class="table" border="1">
								<thead>
									<th scope="col">Worker Name</th>
									<th scope="col">Date</th>
									<th scope="col">Description</th>
									<th scope="col"></th>
								</thead>
								<tbody>
									<?php
									$id = $_GET['id'];
									$query=mysqli_query($conn,"SELECT maintenancedetails.MaintenanceDetailID AS ID, maintenancedetails.Date AS DA, maintenancedetails.Description as DES, workers.Name AS NAME FROM maintenancedetails, workers WHERE maintenancedetails.TreeID = $id AND maintenancedetails.WorkerID = workers.IDWorker");
									while($row=mysqli_fetch_array($query)){
										?>
										<tr>
											<td><?php echo $row['NAME']; ?></td>
											<td><?php echo $row['DA']; ?></td>
											<td><?php echo $row['DES']; ?></td>						
											<td>
												<a href="maintenancedelete.php?id=<?php echo $row['ID']; ?>">Delete</a>
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
<!-- Form for new entry -->
	<div class="container">
  		<div class="row">
  			<h1>Add a New Record</h1>
  			<div class="card">
  				<div class="card-body">
  					<form class="inputFormMaintenance" method="POST" action="maintenanceadd.php?id=<?php echo $id; ?>">
  						<div class="form-group">
  							<label for="workerName"><strong>Worker Name</strong></label>
  							<br>
  							<input type="text" name="workerName" placeholder="Mike Smith">
  						</div>
  						<div class="form-group">
  							<label for="date"><strong>Date</strong></label>
  							<br>
  							<input type="text" name="date" placeholder="YYYY-MM-DD">
  						</div>
              <div class="form-group">
                <label for="date"><strong>Description</strong></label>
                <br>
                <textarea rows="4" cols="50" name="description" placeholder="Enter your text here..."></textarea>
              </div>
              <button class="btn btn-success" name="add">Add Record</button>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>	

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
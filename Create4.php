<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>Create a Service</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	?>

	<div class="container">

		<?php
		echo '<div style="font-size:40;color:white">Create a Service</div>';
		?>

		<form method="POST" action="Creating4.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="Service_name" class="form-label">Service_name: </label>
				<input type="text" id="Service_name" name="Service_name" class="form-control">
			</div>

			<div class="form-group">
				<label for="Cost" class="form-label">Cost: </label>
				<input type="text" id="Cost" name="Cost" class="form-control">
			</div>

			<div class="form-group">
				<label for="fileToUpload" class="form-label">Select an image to upload: </label>
				<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
				<br>
			</div>

			<div>
				<h3><button type="submit" name="submit" value="Save">Save</button></h3>
				<br>
				<?php
				echo "<td align='center'><a href='service.php' role='button'> <h4>Go Back</h4></a></td>";
				?>
			</div>

	</div>
	</form>
	</div>
	<?php
	mysqli_close($conn);
	?>
</body>

</html>
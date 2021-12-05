<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Customer</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#aaa69d";>

<?php
include "includes/config.php";
?>

<div class="container">

<?php
echo '<div style="font-size:40;color:white">Create a Customer</div>';
?>

<form method="POST" action="Creating.php" enctype="multipart/form-data" >
<div class="form-group">
	<label for="fname" class="form-label">First_Name: </label>
	<input type="text" id="fname" name="fname" class="form-control">
</div>

<div class="form-group">
	<label for="lname" class="form-label">Last_Name: </label>
	<input type="text" id="lname" name="lname" class="form-control">
</div>

<div class="form-group">
	<label for="phone" class="form-label">Phone: </label>
	<input type="text" id="phone" name="phone" class="form-control">
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
	echo "<td align='center'><a href='customer.php' role='button'> <h4>Go Back</h4></a></td>";
	?>
</div>

</div>
	</form>
</div>
<?php
mysqli_close( $conn );
 ?>
</body>
</html>
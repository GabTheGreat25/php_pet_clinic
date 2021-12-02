<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Service</title>
</head>
<body>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Create a Service. </div>';
?>

<form method="POST" action="Creating4.php" enctype="multipart/form-data" >
<div class="form-group">
	<label for="Service_name" >Service_name: </label>
	<input type="text" id="Service_name" name="Service_name" >
</div>

<div class="form-group">
	<label for="Cost" >Cost: </label>
	<input type="text" id="Cost" name="Cost" >
</div>

 <div class="form-group"> 
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
 </div>

<div>
	<h3><button type="submit" name="submit" value="Save">Save</button></h3>
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
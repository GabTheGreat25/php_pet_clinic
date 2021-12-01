<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Customer</title>
</head>
<body>

<?php
include "includes/config.php";
?>

	<?php
echo '<div style="font-size:25;color:blue">Create a Customer. </div>';
?>

<div class="container">

<form method="POST" action="Creating.php" enctype="multipart/form-data" >
<div class="form-group">
	<label for="fname" >First_Name: </label>
	<input type="text" id="fname" name="fname" >
</div>

<div class="form-group">
	<label for="lname" >Last_Name: </label>
	<input type="text" id="lname" name="lname" >
</div>

<div class="form-group">
	<label for="phone" >Phone: </label>
	<input type="text" id="phone" name="phone" >
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
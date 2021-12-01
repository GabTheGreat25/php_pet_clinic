<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Employee</title>
</head>
<body>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Create a Employee. </div>';
?>

<form method="POST" action="Creating2.php" enctype="multipart/form-data" >
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
	<label for="Registration_date" >Registration_date: </label>
	<input type="datetime-local" id="Registration_date" name="Registration_date" >
</div>

<div class="form-group">
	<label for="Email" >Email: </label>
	<input type="email" id="Email" name="Email" >
</div>

<div class="form-group">
	<label for="Password" >Password: </label>
	<input type="password" id="Password" name="Password" >
</div>

<div class="form-group">
	<label for="Password2" >Confirm Password: </label>
	<input type="password" id="Password2" name="Password2" >
</div>

 <div class="form-group"> 
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
 </div>

<div>
	<h3><button type="submit" name="submit" value="Save">Save</button></h3>
	<h3><button type="submit" name="submit" value="Back">Cancel</button></h3>
</div>

</div>
	</form>
</div>
<?php
mysqli_close( $conn );
 ?>
</body>
</html>
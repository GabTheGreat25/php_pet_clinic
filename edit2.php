<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Update a Employee</title>
</head>
<body>

<?php
include "includes/config.php";
$result = mysqli_query( $conn,"SELECT * FROM employee where Employee_id = ".   $_GET['Employee_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Update a Employee. </div>';
?>

<form method="POST" action="update2.php" enctype="multipart/form-data" >

	 <div class="form-group">
    <label for="Employee_id" >Customer_Id: </label>
    <input type='text' id='Employee_id' name='Employee_id' readonly value="<?php echo $_GET['Employee_id']; ?>">
  </div>

 <div class="form-group">
    <label for="fname" >First_Name: </label>
    <input type='text' id='fname' name='fname' value="<?php echo $row['First_name']; ?>">
  </div>

<div class="form-group">
    <label for="lname" >Last_Name: </label>
    <input type='text' id='lname' name='lname' value="<?php echo $row['Last_name']; ?>">
  </div>

<div class="form-group">
    <label for="phone" >Phone: </label>
    <input type='text' id='phone' name='phone' value="<?php echo $row['Phone_number']; ?>">
  </div>


 <div class="form-group">
    <label for="Registration_date" >Registration_date: </label>
    <input type='text' id='Registration_date' name='Registration_date' readonly value="<?php echo $row['Registration_date']; ?>">
  </div>

<div class="form-group">
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type='file' id='fileToUpload' name='fileToUpload'>
  </div>

<div class="form-group"> 
    <label for="imgpath" >Current Image: </label>
    <?php 
    echo "<img border=\"1\" src=\"".$row['Emp_pic']."\" width=\"300\" alt=\"Employee Picture\" height=\"300\">" 
 	 ?>;
 </div>

 <div>
       <h3><button type="submit" name="submit" value="Save">Save</button></h3>
    <h3><button type="submit" name="submit" value="Back">Cancel</button></h3>
</div>


</div>
	</form>
</div>
<?php
mysqli_free_result($result);
mysqli_close( $conn );
 ?>
</body>
</html>
<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Update a Customer</title>
</head>
<body>

<?php
include "includes/config.php";
$result = mysqli_query( $conn,"SELECT * FROM customer where Cust_id = ".   $_GET['Cust_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Update a Customer. </div>';
?>

<form method="POST" action="update.php" enctype="multipart/form-data" >

	 <div class="form-group">
    <label for="Cust_id" >Customer_Id: </label>
    <input type='text' id='Cust_id' name='Cust_id' readonly value="<?php echo $_GET['Cust_id']; ?>">
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
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type='file' id='fileToUpload' name='fileToUpload'>
  </div>

<div>
	   <h3><button type="submit" name="submit" value="Save">Save</button></h3>
    <h3><button type="submit" name="submit" value="Back">Cancel</button></h3>
</div>

<div class="form-group"> 
    <label for="imgpath" >Current Image: </label>
    <?php 
    echo "<img border=\"1\" src=\"".$row['Cust_pic']."\" width=\"300\" alt=\"Customer Picture\" height=\"300\">" 
 	 ?>;
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
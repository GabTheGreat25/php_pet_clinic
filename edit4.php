<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Update a Employee</title>
</head>
<body>

<?php
include "includes/config.php";
$result = mysqli_query( $conn,"SELECT * FROM service where Service_id  = ".   $_GET['Service_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Update a Employee. </div>';
?>

<form method="POST" action="update4.php" enctype="multipart/form-data" >

	 <div class="form-group">
    <label for="Service_id" >Service_id: </label>
    <input type='text' id='Service_id' name='Service_id' readonly value="<?php echo $_GET['Service_id']; ?>">
  </div>

 <div class="form-group">
    <label for="Service_name" >Service_name: </label>
    <input type='text' id='Service_name' name='Service_name' value="<?php echo $row['Service_name']; ?>">
  </div>

<div class="form-group">
    <label for="Cost" >Cost: </label>
    <input type='text' id='Cost' name='Cost' value="<?php echo $row['Cost']; ?>">
  </div>

<div class="form-group">
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type='file' id='fileToUpload' name='fileToUpload'>
  </div>

<div class="form-group"> 
    <label for="imgpath" >Current Image: </label>
    <?php 
    echo "<img border=\"1\" src=\"".$row['Haircut_pic']."\" width=\"300\" alt=\"Employee Picture\" height=\"300\">" 
 	 ?>;
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
mysqli_free_result($result);
mysqli_close( $conn );
 ?>
</body>
</html>
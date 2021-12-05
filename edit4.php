<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Update a Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#aaa69d";>
<body>

<?php
include "includes/config.php";
$result = mysqli_query( $conn,"SELECT * FROM service where Service_id  = ".   $_GET['Service_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

<div class="container">

	<?php
echo '<div style="font-size:40;color:white">Update a Service</div>';
?>

<form method="POST" action="update4.php" enctype="multipart/form-data" >

	 <div class="form-group">
    <label for="Service_id" class="form-label">Service_id: </label>
    <input type='text' id='Service_id' name='Service_id' readonly value="<?php echo $_GET['Service_id']; ?>"  class="form-control">
  </div>

 <div class="form-group">
    <label for="Service_name" class="form-label">Service_name: </label>
    <input type='text' id='Service_name' name='Service_name' value="<?php echo $row['Service_name']; ?>"  class="form-control">
  </div>

<div class="form-group">
    <label for="Cost" class="form-label">Cost: </label>
    <input type='text' id='Cost' name='Cost' value="<?php echo $row['Cost']; ?>"  class="form-control">
  </div>

<div class="form-group">
    <label for="fileToUpload" class="form-label">Select an image to upload: </label>
    <input type='file' id='fileToUpload' name='fileToUpload'  class="form-control">
  </div>

<div class="form-group"> 
  <br>
    <label for="imgpath" class="form-label">Current Image: </label>
    <?php 
    echo "<img border=\"1\" src=\"".$row['Haircut_pic']."\" width=\"300\" alt=\"Employee Picture\" height=\"300\">" 
 	 ?>;
 </div>

 <div>
   <br>
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
mysqli_free_result($result);
mysqli_close( $conn );
 ?>
</body>
</html>
<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Pet</title>
</head>
<body>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Create a Pet. </div>';
?>

<form method="POST" action="Creating3.php" enctype="multipart/form-data" >
<div class="form-group">
	<label for="Name" >Name: </label>
	<input type="text" id="Name" name="Name" >
</div>

<div class="form-group">
	<label for="Age" >Age: </label>
	<input type="number" max="100" min="1" style="width:50" step = "1" id="Age" name="Age" >
</div>

<div class="form-group">
                <label>
                <span>Sex: </span>
                <select name="Sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
                </label>
</div>


<div class="form-group">
	<label for="Breed" >Breed: </label>
	<input type="text" id="Breed" name="Breed" >
</div>

 <div class="form-group"> 
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
 </div>

  <div class="form-group"> 
   <label for="Cust_id">Customer_Name: </label>
  <select name="Cust_id" id="Cust_id">
   <?php
   $sql = "select Cust_id, First_name, Last_name from customer";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['Cust_id'].'>'.$rows['Last_name'].','.$rows['First_name'].'</option>';
    } 
  ?>
</select>
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
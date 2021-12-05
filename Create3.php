<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Create a Pet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#aaa69d";>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:40;color:white">Create a Pet</div>';
?>

<form method="POST" action="Creating3.php" enctype="multipart/form-data" >
<div class="form-group">
	<label for="Name" class="form-label">Name: </label>
	<input type="text" id="Name" name="Name" class="form-control">
</div>

<div class="form-group">
	<label for="Age" class="form-label">Age: </label>
	<input type="number" max="100" min="1" style="width: 80.9em;" step = "1" id="Age" name="Age" class="form-control">
</div>

<div class="form-group">
                <label class="form-label">
                <span>Sex: </span>
                <select name="Sex" style="width: 92.5em;" class="form-select form-select-sm">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
                </label>
</div>


<div class="form-group">
	<label for="Breed" class="form-label">Breed: </label>
	<input type="text" id="Breed" name="Breed" class="form-control">
</div>

 <div class="form-group"> 
    <label for="fileToUpload" class="form-label">Select an image to upload: </label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"> 
 </div>

  <div class="form-group"> 
   <label for="Cust_id" class="form-label">Customer_Name: </label>
  <select name="Cust_id" id="Cust_id" style="width: 92.5em;" class="form-select form-select-sm">
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
<br>
	<h3><button type="submit" name="submit" value="Save" >Save</button></h3>
  <br>
  <?php
	echo "<td align='center'><a href='pets.php' role='button'> <h4>Go Back</h4></a></td>";
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
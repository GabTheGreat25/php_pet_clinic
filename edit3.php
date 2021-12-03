<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Update a Pet</title>
</head>
<body>

<?php
include "includes/config.php";
$result = mysqli_query( $conn,"SELECT c.First_name, c.Last_name, c.Phone_number, c.Cust_pic, p.Name, p.Age, p.Sex, p.Breed, p.Pet_pic, p.Cust_id FROM pet p INNER JOIN customer c ON p.Cust_id = c.Cust_id  where Pet_id = ". $_GET['Pet_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Update a Pet. </div>';
?>

<form method="POST" action="update3.php" enctype="multipart/form-data" >

	 <div class="form-group">
    <label for="Pet_id" >Pet_Id: </label>
    <input type='text' id='Pet_id' name='Pet_id' readonly value="<?php echo $_GET['Pet_id']; ?>">
  </div>

 <div class="form-group">
    <label for="Name" >Name: </label>
    <input type='text' id='Name' name='Name' value="<?php echo $row['Name']; ?>">
  </div>

  <div class="form-group">
	<label for="Age" >Age: </label>
	<input type="number" max="100" min="1" style="width:50" step = "1" id="Age" name="Age" value="<?php echo $row['Name']; ?>
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
    <label for="Breed" >Phone: </label>
    <input type='text' id='Breed' name='Breed' value="<?php echo $row['Breed']; ?>">
  </div>

   <div class="form-group"> 
   <label for="Cust_id">Customer_Name: </label>
  <select name="Cust_id" id="Cust_id">
  <?php

   $sql = "SELECT Cust_id,First_name,Last_name FROM customer where Cust_id <>".$row['Cust_id'];
   $results = mysqli_query($conn,$sql);

   echo '<option value='.$row['Cust_id'].'>'.$row['Last_name'].','.$row['First_name'].'</option>';

   while ($rows = mysqli_fetch_assoc($results)){ 
      echo '<option value='.$rows['Cust_id'].'>'.$rows['Last_name'].','.$rows['First_name'].'</option>';
    } // kaya 2 querry kasi una pinakita yung laman tapos pangalawa tinawag ulit para pumili ka kaya 2 beses tinawag
  ?>
</select>
</div>

<div class="form-group">
    <label for="fileToUpload" >Select an image to upload: </label>
    <input type='file' id='fileToUpload' name='fileToUpload'>
  </div>

<div class="form-group"> 
    <label for="imgpath" >Current Image: </label>
    <?php 
    echo "<img border=\"1\" src=\"".$row['Pet_pic']."\" width=\"300\" alt=\"Pet Picture\" height=\"300\">" 
     ?>;
 </div>

 <div>
	   <h3><button type="submit" name="submit" value="Save">Save</button></h3>
     <?php
	echo "<td align='center'><a href='pets.php' role='button'> <h4>Go Back</h4></a></td>";
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
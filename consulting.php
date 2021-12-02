<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Consultation</title>
</head>
<body>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:25;color:blue">Consultation</div>';
?>

<form method="POST" action="consultation.php">

<fieldset>

<div class="form-group"> 
   <label for="Employee_id">Vet: </label>
  <select name="Employee_id" id="Employee_id">
   <?php
   $sql = "select Employee_id, First_name, Last_name from employee";
   $results = mysqli_query($conn,$sql);
   while ($rows = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$rows['Employee_id'].'>'.$rows['Last_name'].','.$rows['First_name'].'</option>';
    } 
  ?>
</select>
</div>

<div class="form-group"> 
   <label for="Pet_id">Pet: </label>
  <select name="Pet_id" id="Pet_id">
   <?php
   $sql = "select Pet_id, Name  from pet";
   $results = mysqli_query($conn,$sql);
   while ($row = mysqli_fetch_assoc($results)){ 
    echo '<option value='.$row['Pet_id'].'>'.$row['Name'].'</option>';
    } 
  ?>
</select>
</div>

<div class="form-group">
	<label for="Date_of_Consultation" >Date_of_Consultation: </label>
	<input type="datetime-local" id="Date_of_Consultation" name="Date_of_Consultation" >
</div>

<div class="form-group">
<label>
                <span>Disease or Injuries: </span>
                <select name="Disease_Injuries">
                <option value="Cataracts">Cataracts</option>
                <option value="Arthritis">Arthritis</option>
                <option value="Ear_Infections">Ear_Infections</option>
                <option value="Kennel_Cough">Kennel_Cough</option>
                <option value="Diarrhoea">Diarrhoea</option>
                <option value="Fleas_and_ticks">Fleas_and_ticks</option>
                <option value="Heartworm">Heartworm</option>
                <option value="Broken_Bones">Broken_Bones</option>
                <option value="Obesity">Obesity</option>
                <option value="Cancer">Cancer</option>
                </label>
                </select>
</div>

<div class="form-group">
	<label for="Comments" >Comments: </label>
	<input type="text" id="Comments" name="Comments" >
</div>

<div>
	<h3><button type="submit" name="submit" value="Save">Save</button></h3>
  <?php
	echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
	?>
</div>

</div>
	</form>
</div>
</fieldset>
<?php
mysqli_close( $conn );
 ?>
</body>
</html>
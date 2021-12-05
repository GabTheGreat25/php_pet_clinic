<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>Consultation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color:#aaa69d";>

<?php
include "includes/config.php";
?>

<div class="container">

	<?php
echo '<div style="font-size:40;color:white">Consultation</div>';
?>

<form method="POST" action="consultation.php">

<div class="form-group"> 
   <label for="Employee_id" class="form-label">Vet: </label>
  <select name="Employee_id" id="Employee_id" style="width: 92.5em;" class="form-select form-select-sm">
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
   <label for="Pet_id" class="form-label">Pet: </label>
  <select name="Pet_id" id="Pet_id" style="width: 92.5em;" class="form-select form-select-sm">
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
	<label for="Date_of_Consultation" class="form-label">Date_of_Consultation: </label>
	<input type="datetime-local" id="Date_of_Consultation" name="Date_of_Consultation" class="form-control">
</div>

<div class="form-group">
<label class="form-label">
                <span>Disease or Injuries: </span>
                <select name="Disease_Injuries" style="width: 92.5em;" class="form-select form-select-sm">
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
	<label for="Comments" class="form-label">Comments: </label>
	<input type="text" id="Comments" name="Comments" class="form-control">
  <br>
</div>

<div>
	<h3><button type="submit" name="submit" value="Save">Save</button></h3>
  <br>
  <?php
	echo "<td align='center'><a href='consultationz.php' role='button'> <h4>Go Back</h4></a></td>";
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
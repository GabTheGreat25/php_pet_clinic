<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Update Consulatation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#aaa69d" ;>

  <?php
  include "includes/config.php";
  $result = mysqli_query($conn, "sELECT * FROM consultation c INNER JOIN employee e ON c.Employee_id = e.Employee_id INNER JOIN pet p ON c.Pet_id  = p.Pet_id WHERE Consultation_id = " .   $_GET['Consultation_id']);
  $row = mysqli_fetch_array($result);
  //print_r($row);
  ?>

  <div class="container">

    <?php
    echo '<div style="font-size:40;color:white">Update Consulatation</div>';
    ?>

    <form method="POST" action="update5.php">

      <div class="form-group">
        <label for="Consultation_id" class="form-label">Consultation_id: </label>
        <input type='text' id='Consultation_id' name='Consultation_id' readonly value="<?php echo $_GET['Consultation_id']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="Employee_id" class="form-label">Employee_Name: </label>
        <select name="Employee_id" id="Employee_id" style="width: 92.5em;" class="form-select form-select-sm">
          <?php

          $sql = "SELECT Employee_id ,First_name,Last_name FROM employee where Employee_id <>" . $row['Employee_id'];
          $results = mysqli_query($conn, $sql);

          echo '<option value=' . $row['Employee_id'] . '>' . $row['Last_name'] . ',' . $row['First_name'] . '</option>';

          while ($rows = mysqli_fetch_assoc($results)) {
            echo '<option value=' . $rows['Employee_id'] . '>' . $rows['Last_name'] . ',' . $rows['First_name'] . '</option>';
          } // kaya 2 querry kasi una pinakita yung laman tapos pangalawa tinawag ulit para pumili ka kaya 2 beses tinawag
          ?>
        </select>
      </div>

     
      <div class="form-group">
        <label for="Pet_id" class="form-label">Pet_Name: </label>
        <select name="Pet_id" id="Pet_id" style="width: 92.5em;" class="form-select form-select-sm">
          <?php

          $sql = "sELECT Pet_id,Name FROM pet where Pet_id  <>" . $row['Pet_id'];
          $results = mysqli_query($conn, $sql);

          echo '<option value=' . $row['Pet_id'] . '>' . $row['Name'] . '</option>';

          while ($rows = mysqli_fetch_assoc($results)) {
            echo '<option value=' . $rows['Pet_id'] . '>' . $rows['Name'] . '</option>';
          } // kaya 2 querry kasi una pinakita yung laman tapos pangalawa tinawag ulit para pumili ka kaya 2 beses tinawag
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="Date_of_Consultation" class="form-label">Date_of_Consultation: </label>
        <input type='text' id='Date_of_Consultation' name='Date_of_Consultation' value="<?php echo $row['Date_of_Consultation']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="Disease_Injuries" class="form-label">Disease_Injuries: </label>
        <input type='text' id='Disease_Injuries' name='Disease_Injuries' value="<?php echo $row['Disease_Injuries']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="Price" class="form-label">Price: </label>
        <input type="number" max="1000" min="1" style="width: 80.9em;" step="1" id="Price" name="Price" value="<?php echo $row['Price']; ?>"class=" form-control">
      </div>

      <div class="form-group">
        <label for="Comments" class="form-label">Comments: </label>
        <input type='text' id='Comments' name='Comments' value="<?php echo $row['Comments']; ?>" class="form-control">
      </div>

      <div>
          <br>
        <h3><button type="submit" name="submit" value="Save">Save</button></h3>
        <br>
        <?php
        echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
        ?>
      </div>

  </div>
  </form>
  </div>
  <?php
  mysqli_free_result($result);
  mysqli_close($conn);
  ?>
</body>

</html>
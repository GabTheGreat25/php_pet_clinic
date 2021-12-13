<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Update Transacntion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#aaa69d" ;>

  <?php
  include "includes/config.php";
  $result = mysqli_query($conn, "sELECT * FROM transaction t INNER JOIN employee e ON t.Employee_id = e.Employee_id INNER JOIN pet p ON t.Pet_id  = p.Pet_id WHERE Transaction_id  = " .   $_GET['Transaction_id']);
  $row = mysqli_fetch_array($result);
  //print_r($row);
  ?>

  <div class="container">

    <?php
    echo '<div style="font-size:40;color:white">Update Transaction </div>';
    ?>

    <form method="POST" action="update6.php">

      <div class="form-group">
        <label for="Transaction_id" class="form-label">Transaction_id: </label>
        <input type='text' id='Transaction_id' name='Transaction_id' readonly value="<?php echo $_GET['Transaction_id']; ?>" class="form-control">
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
        <label for="Schedule" class="form-label">Schedule: </label>
        <input type='text' id='Schedule' name='Schedule' value="<?php echo $row['Schedule']; ?>" class="form-control">
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
<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Transaction</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#aaa69d" ;>

  <?php
  include "includes/config.php";
  ?>

    <strong>
        <h1 align="center" style="color:white">WELCOME TO OUR GROOMING SERVICES</h1>
    </strong>

<div class="container">
  <form method="POST" action="checkkk.php">
    <div class="form-group">
      <label for="Cust_id " class="control-label">Customer</label>
      <select name="Cust_id" id="Cust_id" style="width: 92.5em;" class="form-select form-select-sm">
        <?php
        $sql = "Select Cust_id ,Last_name,First_name From customer";
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
          echo '<option value=' . $rows['Cust_id'] . '>' . $rows['First_name'] . ',' . $rows['Last_name'] . '</option>';
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="Employee_id" class="control-label">Groomer</label>
      <select name="Employee_id" id="Employee_id" style="width: 92.5em;" class="form-select form-select-sm">
        <?php
        $sql = "Select Employee_id,Last_name,First_name From employee";
        $results = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
          echo '<option value=' . $rows['Employee_id'] . '>' . $rows['First_name'] . ',' . $rows['Last_name'] . '</option>';
        }
        ?>
      </select>
    </div>
<br>
    <div>
      <button type="submit" name="submit" class="btn btn-primary" value="end">Next</button>
      <a href="index.php" class="btn btn-default" role="button">Cancel</a>
    </div>
      </div>

</body>

</html>
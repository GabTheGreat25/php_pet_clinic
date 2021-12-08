<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Update a Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color:#aaa69d" ;>

  <?php
  include "includes/config.php";
  $result = mysqli_query($conn, "SELECT * FROM customer where Cust_id = " .   $_GET['Cust_id']);
  $row = mysqli_fetch_array($result);
  //print_r($row);
  ?>

  <div class="container">

    <?php
    echo '<div style="font-size:40;color:white">Update a Customer</div>';
    ?>

    <form method="POST" action="update.php" enctype="multipart/form-data">

      <div class="form-group">
        <label for="Cust_id" class="form-label">Customer_Id: </label>
        <input type='text' id='Cust_id' name='Cust_id' readonly value="<?php echo $_GET['Cust_id']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="fname" class="form-label">First_Name: </label>
        <input type='text' id='fname' name='fname' value="<?php echo $row['First_name']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="lname" class="form-label">Last_Name: </label>
        <input type='text' id='lname' name='lname' value="<?php echo $row['Last_name']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="phone" class="form-label">Phone: </label>
        <input type='text' id='phone' name='phone' value="<?php echo $row['Phone_number']; ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="fileToUpload" class="form-label">Select an image to upload: </label>
        <input type='file' id='fileToUpload' name='fileToUpload' class="form-control">
      </div>

      <div class="form-group">
        <br>
        <label for="imgpath" class="form-label">Current Image: </label>
        <?php
        echo "<img border=\"1\" src=\"" . $row['Cust_pic'] . "\" width=\"300\" alt=\"Customer Picture\" height=\"300\">"
        ?>;
        <br></br>
      </div>

      <div>
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
  mysqli_close($conn);
  ?>
</body>

</html>
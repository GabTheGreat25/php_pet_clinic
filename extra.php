<!DOCTYPE html PUBLIC >
<html>
<head>
    <title>
        Creating Customer
    </title>
</head>
<body>

<?php
include "includes/config.php";
//print_r($_POST);
if ($_POST['submit'] ==  "Save"){
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $phone = $_POST['phone'];

 $uploads_dir = "././upload/";

 $target_file = $uploads_dir . basename($_FILES["fileToUpload"]["name"]);

 $temp_name = $_FILES["fileToUpload"]["tmp_name"];

 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

  $sql = "INSERT INTO customer (First_name,Last_name,Phone_number,Cust_pic) VALUES ('$fname','$lname','$phone','$target_file')";
        echo $sql;
 $result = mysqli_query( $conn,$sql);
 if ($result) {
  echo '<div style="font-size:50;color:blue">CUSTOMER SAVED! </div>';
 }
 else{
 echo mysqli_error();
 }
}
else{
     echo '<div style="font-size:50;color:blue">YOU CANCEL THE QUERRY! </div>';
}
?>
<a href = "index.php" role = "button"> <h4>Back</h4>  </a></i>
</body>
</html>

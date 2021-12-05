<!DOCTYPE html PUBLIC >
<html>
<head>
    <title>Creating a Customer</title>
</head>
<body style="background-color:#aaa69d";>

<?php
session_start();
if (!isset($_SESSION['Employee_id'])){
    include "includes/config.php";
    require ('includes/login_functions.inc.php');
    redirect_user();
 //echo "<p>please log in to create a user</p>";
 //echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
}

//print_r($_POST);
else{
    $errors = array();
    include "includes/config.php";

    if (isset($_POST['submit'])) {
    if (empty($_POST['fname'])) {
   $errors[] = 'You forgot to enter your first name so the system could not upload your picture';
    } else { 
        $fname = $_POST['fname'];
    }
}

    if (isset($_POST['submit'])) {
    if (empty($_POST['lname'])) {
   $errors[] = 'You forgot to enter your last name so the system could not upload your picture';
    } else { 
        $lname = $_POST['lname'];
    }
}

    if (isset($_POST['submit'])) {
    if (empty($_POST['phone'])) {
    $errors[] = 'You forgot to enter your contact number so the system could not upload your picture';
    } else { 
        $phone = $_POST['phone'];
    }
}

 //$fname = $_POST['fname'];
 //$lname = $_POST['lname'];
 //$phone = $_POST['phone'];
$target_dir = "././upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo nl2br("File is an image - " . $check["mime"] . ".\n");
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000 ) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0){
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
       if(empty($errors)){

        (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));

        echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

        $sql = "INSERT INTO customer(First_name,Last_name,Phone_number,Cust_pic) VALUES ('$fname','$lname','$phone','$target_file')";
        echo $sql;

 $result = @mysqli_query( $conn,$sql);

 if ($result) {
  echo '<div style="font-size:50;color:blue">CUSTOMER SAVED! </div>';
  echo "<td align='center'><a href='customer.php' role='button'> <h4>Go Back</h4></a></td>";
 }
 else{
 echo mysqli_error();
 }
}
else{
    foreach ($errors as $msg) { // Print each error.

echo " - $msg<br />\n";
}
}
}
?>
</body>
</html>

<!DOCTYPE html PUBLIC >
<html>
<head>
    <title>Creating a Service</title>
</head>
<body>

<?php
include "includes/config.php";
//print_r($_POST);
$errors = array(); 
if ($_POST['submit'] ==  "Save"){

  if (isset($_POST['submit'])) {
    if (empty($_POST['Service_name'])) {
   $errors[] = 'You forgot to enter your Service_name so the system could not upload your picture';
    } else { 
        $Service_name = $_POST['Service_name'];
    }
}

    if (isset($_POST['submit'])) {
    if (empty($_POST['Cost'])) {
   $errors[] = 'You forgot to enter your Cost so the system could not upload your picture';
    } else { 
        $Cost = $_POST['Cost'];
    }
}

 //$Service_name = $_POST['Service_name'];
 //$Cost = $_POST['Cost'];
 //$Schedule = $_POST['Schedule'];
$target_dir = "././upload2/";
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
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
  if(empty($errors)){

        (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));

        echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");

        $sql = "INSERT INTO service(Service_name,Cost,Haircut_pi) VALUES ('$Service_name','$Cost','$target_file')";
        echo $sql;

 $result = @mysqli_query( $conn,$sql);

 if ($result) {
  echo '<div style="font-size:50;color:blue">CUSTOMER SAVED! </div>';
    echo "<td align='center'><a href='service.php' role='button'> <h4>Go Back</h4></a></td>";
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
else{
     echo '<div style="font-size:50;color:blue">YOU CANCEL THE QUERRY! </div>';
       echo "<td align='center'><a href='index.php' role='button'> <h4>Back to Home Page</h4></a></td>";
}
?>
</body>
</html>

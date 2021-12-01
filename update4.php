<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>
		Updating Service
	</title>
</head>
<body>

<?php
include "includes/config.php";
//print_r($_POST);
if ($_POST['submit'] ==  "Save"){
 $Service_name = $_POST['Service_name'];
 $Cost = $_POST['Cost'];
 //$Schedule = $_POST['Schedule'];
$target_dir = "././upload4/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo nl2br("File is an image - " . $check["mime"] . ".\n");
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    //$uploadOk = 0;
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
elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo nl2br("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\n");
           $sql = "UPDATE service set Service_name='$Service_name',Cost='$Cost',Haircut_pic='$target_file' WHERE Service_id =".$_POST['Service_id'];
        echo $sql;
 $result = mysqli_query( $conn,$sql);
 if ($result) {
  echo '<div style="font-size:50;color:blue">SERVICE UPDATED! </div>';
 }
 else{
 echo mysqli_error();
 }
     }
 else {
     echo "Sorry, there was an error uploading your file.";
     }
}
else{
	 echo '<div style="font-size:50;color:blue">YOU CANCEL THE UPDATE! </div>';
}
?>
<a href = "index.php" role = "button"> <h4>Back</h4>  </a></i>
</body>
</html>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>
        Updating Employee
    </title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['Employee_id'])) {
        include "includes/config.php";
        require('includes/login_functions.inc.php');
        //echo "<p>please log in to edit this user</p>";
        //echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
        redirect_user();
    }
    //print_r($_POST);
    else {
        include "includes/config.php";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $target_dir = "././upload2/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
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
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo nl2br("The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.\n");
            $sql = "UPDATE employee set First_name='$fname',Last_name='$lname',Phone_number='$phone',Emp_pic='$target_file' WHERE Employee_id=" . $_POST['Employee_id'];
            echo $sql;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div style="font-size:50;color:blue">EMPLOYEE UPDATED! </div>';
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>
    <a href="employee.php" role="button">
        <h4>Back</h4>
    </a></i>
</body>

</html>
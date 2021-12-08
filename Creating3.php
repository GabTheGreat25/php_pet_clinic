<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Creating a Pet</title>
</head>

<body style="background-color:#aaa69d" ;>

    <?php
    session_start();
    if (!isset($_SESSION['Employee_id'])) {
        include "includes/config.php";
        require('includes/login_functions.inc.php');
        redirect_user();
        //echo "<p>please log in to create a pet</p>";
        //echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
    }

    //print_r($_POST);
    else {
        $errors = array();
        include "includes/config.php";

        if (isset($_POST['submit'])) {
            if (empty($_POST['Name'])) {
                $errors[] = 'You forgot to enter your Name so the system could not upload your picture';
            } else {
                $Name = $_POST['Name'];
            }
        }

        if (isset($_POST['submit'])) {
            if (empty($_POST['Age'])) {
                $errors[] = 'You forgot to enter your Age so the system could not upload your picture';
            } else {
                $Age = $_POST['Age'];
            }
        }

        if (isset($_POST['submit'])) {
            if (empty($_POST['Sex'])) {
                $errors[] = 'You forgot to enter your Sex so the system could not upload your picture';
            } else {
                $Sex = $_POST['Sex'];
            }
        }


        if (isset($_POST['submit'])) {
            if (empty($_POST['Breed'])) {
                $errors[] = 'You forgot to enter your Breed so the system could not upload your picture';
            } else {
                $Breed = $_POST['Breed'];
            }
        }

        if (isset($_POST['submit'])) {
            if (empty($_POST['Cust_id'])) {
                $errors[] = 'You forgot to enter your Cust_id so the system could not upload your picture';
            } else {
                $id = $_POST['Cust_id'];
            }
        }

        //$Name = $_POST['Name'];
        //$Age = $_POST['Age'];
        //$Sex = $_POST['Sex'];
        //$Breed = $_POST['Breed'];
        //$id = $_POST['Cust_id'];
        $target_dir = "././upload3/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            // echo nl2br("File is an image - " . $check["mime"] . ".\n");
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
        }

        if (empty($errors)) {

            (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));

            echo nl2br("The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.\n");

            $sql = "INSERT INTO pet(Name,Age,Sex,Breed,Pet_pic,Cust_id ) VALUES ('$Name','$Age','$Sex','$Breed','$target_file',$id)";
            echo $sql;

            $result = @mysqli_query($conn, $sql);

            if ($result) {
                header('Location: pets.php');
            } else {
                echo mysqli_error();
            }
        } else {
            foreach ($errors as $msg) { // Print each error.

                echo " - $msg<br />\n";
            }
        }
    }
    ?>
</body>

</html>
<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>
        Updating CONSULTATION
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
        $Consultation_id = $_POST['Consultation_id'];
        $Employee_id = $_POST['Employee_id'];
        $Pet_id = $_POST['Pet_id'];
        $Date_of_Consultation = $_POST['Date_of_Consultation'];
        $Disease_Injuries = $_POST['Disease_Injuries'];
        $Price = $_POST['Price'];
        $Comments = $_POST['Comments'];
        
            $sql = "UPDATE consultation set Consultation_id='$Consultation_id', Employee_id='$Employee_id', Pet_id='$Pet_id', Date_of_Consultation='$Date_of_Consultation', Disease_Injuries='$Disease_Injuries', Price='$Price', Comments='$Comments' WHERE Consultation_id=" . $_POST['Consultation_id'];
            echo $sql;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div style="font-size:50;color:blue">CONSULTATION UPDATED! </div>';
            } else {
                echo mysqli_error();
            }
        }
    ?>
    <a href="index.php" role="button">
        <h4>Back</h4>
    </a></i>
</body>

</html>
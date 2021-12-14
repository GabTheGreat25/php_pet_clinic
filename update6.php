<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>
        Updating TRANSACTION
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
        $Transaction_id = $_POST['Transaction_id'];
        $Employee_id = $_POST['Employee_id'];
        //$Pet_id = $_POST['Pet_id'];
        $Schedule = $_POST['Schedule'];
        
            $sql = "UPDATE transaction set Transaction_id='$Transaction_id', Employee_id='$Employee_id', Schedule='$Schedule' WHERE Transaction_id=" . $_POST['Transaction_id'];
            echo $sql;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div style="font-size:50;color:blue">TRANSACTION UPDATED! </div>';
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
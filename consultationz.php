<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Consultation
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body style="background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 115% ; ">
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <button><a href="consulting.php">
                <h4>Consult Your Pet</h4>
            </a></button>
        <nav>
            <ul>
                <button> <a href="index.php">
                        <h5>Home</h5>
                    </a></button>
                <button> <a href="pets.php">
                        <h5>Pets</h5>
                    </a></button>
                <button><a href="customer.php">
                        <h5>Customers</h5>
                    </a></button>
                <button><a href="employee.php">
                        <h5>Employee</h5>
                    </a></button>
                <button><a href="service.php">
                        <h5>Service</h5>
                    </a></button>
                <button><a href="consultationz.php">
                        <h5>Consultation</h5>
                    </a></button>
            </ul>
        </nav>
        <button><?php if ((isset($_SESSION['Employee_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php')) {
                    echo '<a href="logout.php"><h3>Logout</h3></a>';
                } else {
                    echo '<a href="login.php"><h3>Login</h3></a>';
                }
                ?>
        </button>
    </header>
<form method="POST">
<input type="number" max="100" min="1" style="width: 10em;"  step="1" name="find">
<input type="submit" value="Search Pet Id">
</form>

    <?php
     //include "includes/config.php";
    if(isset($_POST['find'])){
        require_once "search.php";
        if(count($results) > 0){
            foreach ($results as $row){
                //echo "<tr>\n";
                echo "<div>" . $row['Name'] . "</div>";
                echo "<div>" . $row['Date_of_Consultation'] . "</div>";
                echo "<div>" . $row['Disease_Injuries'] . "</div>";
                echo "<div>" . $row['Comments'] . "</div>";
                echo "<br>";
               //echo "</tr>\n";
            }
        } else { 
            echo  "<td>No Results Found.</td>";
        }
    }
    ?>
</body>

</html>
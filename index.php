<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Home
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body style="background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 115% ; ">
    <!--<audio autoplay="" loop="" src="./Joe Lamont  Victims Of Love Lyrics.mp3"></audio>-->
    <?php
    include "includes/config.php";
    ?>
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
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
                ?></button>
    </header>
    <button><a href="export.php">
            <h2>Export</h2>
        </a></button>
    <button><a href="import.php">
            <h2>Import</h2>
        </a></button>
    <button><a href="transac.php">
            <h2>transac</h2>
        </a></button>
        <button><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
            <h2>troll</h2>
        </a></button>
</body>

</html>
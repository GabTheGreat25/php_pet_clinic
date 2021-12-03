<!DOCTYPE html>
<html lang="en">
<head>
    <title>
	<?php
        session_start(); 
	?>
</title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body style = "background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 100% ; ">
<audio autoplay="" loop="" src="./Joe Lamont  Victims Of Love Lyrics.mp3"></audio>
    <?php
include "includes/config.php";
?>
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <nav>
            <ul>
            <button> <a href = "index.php"><h4>Home</h4></a></button>
                <button> <a href = "pets.php"><h4>Pets</h4></a></button>
                <button><a href = "customer.php"><h4>Customers</h4></a></button>
                <button><a href = "employee.php"><h4>Employee</h4></a></button>
                <button><a href = "service.php"><h4>Service</h4></a></button>
                <button><a href = "consultationz.php"><h4>consultation</h4></a></button>
            </ul>
        </nav>
        <button><?php if ( (isset($_SESSION['Employee_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
echo '<a href="logout.php"><h3>Logout</h3></a>';
} else {
echo '<a href="login.php"><h3>Login</h3></a>';
}
?></button>
    </header>
    <button><a href = "export.php"><h2>Export</h2></a></button>
    <button><a href = "import.php"><h2>Import</h2></a></button>
</body>
</html>
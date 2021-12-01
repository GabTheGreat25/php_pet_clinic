<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar 1</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <?php
include "includes/config.php";
?>
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <nav>
            <ul>
                <button> <a href = "index.php"><li>Home</li></a></button>
                <button> <a href = "pets.php"><li>Pets</li></a></button>
                <button><a href = "customer.php"><li>Customers</li></a></button>
                <button><a href = "employee.php"><li>Employee</li></a></button>
                <button><a href = "service.php"><li>Service</li></a></button>
            </ul>
        </nav>
        <button><?php echo '<a href="logout.php"> Logout</a>';?></button>
    </header>
</body>
</html>
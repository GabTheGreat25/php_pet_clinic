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

    <div class="form-group">
        <form align="center" action="" method="GET">
            <label for="">Input Pet Name</label>
            <div class="row">
                <div class="col-md-8">
                    <input type="text" style="text-align:center" name="Name" value="<?php if (isset($_GET['Name'])) {
                                                                                        echo $_GET['Name'];
                                                                                    } ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <br>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "mydb_gabz");

        if (isset($_GET['Name'])) {
            $Name = $_GET['Name'];

        ?>

            <div>
                <table>
                    <thead>

                        <tr>
                            <th>Disease_Injuries</th>
                            <th>Price</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = mysqli_query($conn, "select p.Pet_pic, p.Breed, p.Name, CONCAT(e.Last_name,',',e.First_name) AS vet, c.Disease_Injuries, c.Price, c.Date_of_Consultation, c.Comments FROM pet p inner join employee e inner join consultation c on p.Pet_id  = c.Pet_id AND e.Employee_id  = c.Employee_id WHERE p.Name='$Name' or p.Pet_id ='$Name' ");
                        $num_rows = mysqli_num_rows($result);
                        //echo "There are currently $num_rows rows in the table<P>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>\n";
                            echo "<td>" . $row['Disease_Injuries'] . "</td>";
                            echo "<td>" . $row['Price'] . "</td>";
                            echo "<td>" . $row['Comments'] . "</td>";
                            echo "</tr>\n";
                        }
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
    </div>
    </div>
</body>

</html>
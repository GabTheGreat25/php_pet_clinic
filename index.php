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
        <br></br>
        <div class="tbl-container">
        <table>
            <thead>
                <tr>
                    <th>Consultation_id</th>
                    <th>Employee</th>
                    <th>Pet</th>
                    <th>Date_of_Consultation</th>
                    <th>Disease_Injuries</th>
                    <th>Price</th>
                    <th>Comments </th>
                </tr>
            </thead>
            <tbody>
        <?php
        $result = mysqli_query($conn, "sELECT * FROM consultation c INNER JOIN employee e ON c.Employee_id = e.Employee_id INNER JOIN pet p ON c.Pet_id  = p.Pet_id ORDER BY Consultation_id ASC");
                $num_rows = mysqli_num_rows($result);
                //echo "There are currently $num_rows rows in the table<P>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>\n";
                    echo "<td>" . $row['Consultation_id'] . "</td>";
                    echo '<td>' . $row['Last_name'] . ',' . $row['First_name'] . '</td>';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo "<td>" . $row['Date_of_Consultation'] . "</td>";
                    echo "<td>" . $row['Disease_Injuries'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['Comments'] . "</td>";
                    echo "<td align='center'><a href='triggerconsult_update.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h1>Update</h1></a></td>";
                    echo "<td align='center'><a href='delete5.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h1>Delete</h1></a></td>";
                    echo "</tr>\n";
                }
                    ?>
                            </tbody>
        </table>
    </div>

        <div class="tbl-container">
        <table>
            <thead>
                <tr>
                    <th>Trigger_id</th>
                    <th>Consultation_id</th>
                    <th>Employee_id</th>
                    <th>Pet_id</th>
                    <th>Date_of_Consultation</th>
                    <th>Disease_Injuries</th>
                    <th>Price </th>
                    <th>Comments</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
        <?php
        $result = mysqli_query($conn, "sELECT * FROM triggerz ORDER BY Trigger_id ASC");
                $num_rows = mysqli_num_rows($result);
                //echo "There are currently $num_rows rows in the table<P>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>\n";
                    echo "<td>" . $row['Trigger_id'] . "</td>";
                    echo "<td>" . $row['Consultation_id'] . "</td>";
                    echo '<td>' . $row['Employee_id'] . '</td>';
                    echo '<td>' . $row['Pet_id'] . '</td>';
                    echo "<td>" . $row['Date_of_Consultation'] . "</td>";
                    echo "<td>" . $row['Disease_Injuries'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['Comments'] . "</td>";
                    echo "<td>" . $row['Action'] . "</td>";
                    //echo "<td align='center'><a href='triggerconsult_update.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h3>Update</h3></a></td>";
                    //echo "<td align='center'><a href='delete5.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h3>Delete</h3></a></td>";
                    echo "</tr>\n";
                }
                    ?>
                            </tbody>
        </table>
    </div>

    <div class="tbl-container">
        <table>
            <thead>
                <tr>
                    <th>Transaction_id </th>
                    <th>Employee</th>
                    <th>Pet</th>
                    <th>Schedule</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $result = mysqli_query($conn, "sELECT * FROM transaction t INNER JOIN employee e ON t.Employee_id = e.Employee_id INNER JOIN pet p ON t.Pet_id  = p.Pet_id ORDER BY Transaction_id ASC");
                $num_rows = mysqli_num_rows($result);
                //echo "There are currently $num_rows rows in the table<P>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>\n";
                    echo "<td>" . $row['Transaction_id'] . "</td>";
                    echo '<td>' . $row['Last_name'] . ',' . $row['First_name'] . '</td>';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo "<td>" . $row['Schedule'] . "</td>";
                    echo "<td align='center'><a href='triggertransac_update.php?Transaction_id=" . $row['Transaction_id'] . "' role='button'> <h1>Update</h1></a></td>";
                    echo "<td align='center'><a href='delete6.php?Transaction_id=" . $row['Transaction_id'] . "' role='button'> <h1>Delete</h1></a></td>";
                    echo "</tr>\n";
                }
                    ?>
                            </tbody>
        </table>
    </div>

    <div class="tbl-container">
        <table>
            <thead>
                <tr>
                    <th>Trigger_id</th>
                    <th>Transaction_id</th>
                    <th>Employee_id</th>
                    <th>Pet_id</th>
                    <th>Schedule</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
        <?php
        $result = mysqli_query($conn, "sELECT * FROM triggerz2 ORDER BY Trigger_id ASC");
                $num_rows = mysqli_num_rows($result);
                //echo "There are currently $num_rows rows in the table<P>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>\n";
                    echo "<td>" . $row['Trigger_id'] . "</td>";
                    echo "<td>" . $row['Transaction_id'] . "</td>";
                    echo '<td>' . $row['Employee_id'] . '</td>';
                    echo '<td>' . $row['Pet_id'] . '</td>';
                    echo "<td>" . $row['Schedule'] . "</td>";
                    echo "<td>" . $row['Action'] . "</td>";
                    //echo "<td align='center'><a href='triggerconsult_update.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h3>Update</h3></a></td>";
                    //echo "<td align='center'><a href='delete5.php?Consultation_id=" . $row['Consultation_id'] . "' role='button'> <h3>Delete</h3></a></td>";
                    echo "</tr>\n";
                }
                    ?>
                            </tbody>
        </table>
    </div>

</body>
</html>
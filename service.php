<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Services
	</title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body style = "background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 100% ; ">
    <?php
    	session_start();
include "includes/config.php";
?>
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <button><a href = "Create4.php"> <h4>Add Service</h4>  </a></button>
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
?>
</button>
    </header>

    <table >
    <thead>
      <tr>
        <th>Service_id </th>
        <th>Service_name</th>
        <th>Cost</th>
        <th>Haircut_pic</th>
        </tr>
    </thead>
 <tbody>
<?php 
if (!isset($_SESSION['Employee_id'])){
    require ('includes/login_functions.inc.php');
 echo "<p>please log in to view pet services.</p>";
 //echo "<td align='center'><a href='index.php' role='button'> <font color='brightgreek'><h2>Go Back</h2></font></a></td>";
}
else{
$result = mysqli_query( $conn,"SELECT * FROM service ORDER BY Service_id ASC" );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_array($result)) {  
        echo "<tr>\n";
        echo "<td>".$row['Service_id']."</td>";
        echo "<td>".$row['Service_name']."</td>";
        echo "<td>".$row['Cost']."</td>";
       // echo "<td>".$row['Schedule']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Haircut_pic']."></td>";
        echo "<td align='center'><a href='edit4.php?Service_id=".$row['Service_id']."' role='button'> <h1>Update</h1></a></td>";
       echo "<td align='center'><a href='delete4.php?Service_id=".$row['Service_id']."' role='button'> <h1>Delete</h1></a></td>";
        echo "</tr>\n"; 
}
}
 //mysqli_free_result($result);
 
 mysqli_close( $conn );
 ?>
</tbody>
</table>
</body>
</html>
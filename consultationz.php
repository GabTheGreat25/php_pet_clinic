<!DOCTYPE html>
<html lang="en">
<head>
    <title>	<?php
	session_start();
	?></title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body style = "background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 100% ; ">
    <?php
include "includes/config.php";
?>
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <button><a href = "consulting.php"> <h4>Consult Your Pet</h4>  </a></button>
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
        <th>Vet </th>
        <th>Pet</th>
        <th>Date_of_Consultation</th>
        <th>Disease&Injuries</th>
        <th>Comments</th>
        </tr>
    </thead>
 <tbody>
<?php 
if (!isset($_SESSION['Employee_id'])){
    require ('includes/login_functions.inc.php');
 echo "<p>please log in to view consultations.</p>";
 //echo "<td align='center'><a href='index.php' role='button'> <font color='brightgreek'><h2>Go Back</h2></font></a></td>";
}
else{
$result = mysqli_query( $conn,"select e.Last_name,e.First_name,p.Name,c.Date_of_Consultation,c.Disease_Injuries,c.Comments from employee e INNER JOIN consultation c ON e.Employee_id = c.Employee_id INNER JOIN pet p ON p.Pet_id = c.Pet_id;");
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_array($result)) {  
        echo "<tr>\n";
        echo '<td>'.$row['Last_name'].','.$row['First_name'].'</td>';
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Date_of_Consultation']."</td>";
        echo "<td>".$row['Disease_Injuries']."</td>";
        echo "<td>".$row['Comments']."</td>";
        //echo "<td align='center'><a href='edit4.php?Service_id=".$row['Service_id']."' role='button'> <h4>Update</h4></a></td>";
       //echo "<td align='center'><a href='delete4.php?Service_id=".$row['Service_id']."' role='button'> <h4>Delete</h4></a></td>";
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
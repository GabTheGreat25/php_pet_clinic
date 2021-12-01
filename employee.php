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
<table >
    <thead>
      <tr>
        <th>Employee_id</th>
        <th>First_Name</th>
        <th>Last_Name</th>
        <th>Phone_number</th>
        <th>Registration_date</th>
        <th>Emp_pic</th>
        </tr>
    </thead>
 <tbody>
<?php 
$result = mysqli_query( $conn,"SELECT * FROM employee ORDER BY Employee_id ASC" );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_array($result)) {  
        echo "<tr>\n";
        echo "<td>".$row['Employee_id']."</td>";
        echo "<td>".$row['First_name']."</td>";
        echo "<td>".$row['Last_name']."</td>";
        echo "<td>".$row['Phone_number']."</td>";
        echo "<td>".$row['Registration_date']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Emp_pic']."></td>";
        echo "<td align='center'><a href='edit2.php?Employee_id=".$row['Employee_id']."' role='button'> <h4>Update</h4></a></td>";
       echo "<td align='center'><a href='delete2.php?Employee_id=".$row['Employee_id']."' role='button'> <h4>Delete</h4></a></td>";
        echo "</tr>\n"; 
}
 mysqli_free_result($result);
 mysqli_close( $conn );
 ?>
</tbody>
</table>
</body>
</html>
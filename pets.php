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
            <button><a href = "Create3.php"> <h4>Add Pet</h4>  </a></button>
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
        <button>Logout</button>
    </header>
<table >
    <thead>
      <tr>
        <th>Pet_id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Breed</th>
        <th>Customer_id</th>
        <th>Pet_pic </th>
        </tr>
    </thead>
 <tbody>
<?php 
$result = mysqli_query( $conn,"SELECT * FROM pet ORDER BY Pet_id ASC" );
$num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
  while ($row = mysqli_fetch_array($result)) {  
        echo "<tr>\n";
        echo "<td>".$row['Pet_id']."</td>";
        echo "<td>".$row['Name']."</td>";
        echo "<td>".$row['Age']."</td>";
        echo "<td>".$row['Sex']."</td>";
        echo "<td>".$row['Breed']."</td>";
        echo "<td>".$row['Cust_id']."</td>";
        echo "<td><img width = '100px' height = '100px' src =".$row['Pet_pic']."></td>";
        echo "<td align='center'><a href='edit3.php?Pet_id=".$row['Pet_id']."' role='button'> <h4>Update</h4></a></td>";
       echo "<td align='center'><a href='delete3.php?Pet_id=".$row['Pet_id']."' role='button'> <h4>Delete</h4></a></td>";
        echo "</tr>\n"; 
}
 mysqli_free_result($result);
 mysqli_close( $conn );
 ?>
</tbody>
</table>    
</body>
</html>
<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>
		Delete A Customer
	</title>
</head>
<body>

<?php
include "includes/config.php";
$sql = "DELETE FROM customer WHERE Cust_id = ". $_GET['Cust_id'];
echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result == true) {
echo '<div style="font-size:50;color:blue">CUSTOMER DELETED! </div>';
//header('location:index.php');
}
else{
 echo mysqli_error();
 }
//mysqli_free_result($result);
mysqli_close( $conn );
?>
<a href = "index.php" role = "button"> <h4>Back</h4>  </a></i>
</body>
</html>
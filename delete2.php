<!DOCTYPE html PUBLIC >
<html>
<head>
	<title>
		Delete A Employee
	</title>
</head>
<body>

<?php
include "includes/config.php";
$sql = "DELETE FROM employee WHERE Employee_id = ". $_GET['Employee_id'];
echo $sql;
$result = mysqli_query( $conn,$sql);
if ($result == true) {
echo '<div style="font-size:50;color:blue">Employee DELETED! </div>';
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
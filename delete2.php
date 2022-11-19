<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Employee
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM employee WHERE Employee_id = " . $_GET['Employee_id'];
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		//echo '<div style="font-size:50;color:blue">Employee DELETED! </div>';
		header('location:employee.php');
	} else {
		echo mysqli_error($conn);
	}
	//mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
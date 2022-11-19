<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Customer
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM customer WHERE Cust_id = " . $_GET['Cust_id'];
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		//echo '<div style="font-size:50;color:blue">CUSTOMER DELETED! </div>';
		header('location:customer.php');
	} else {
		echo mysqli_error($conn);
	}
	//mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
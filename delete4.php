<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Service
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM service WHERE Service_id = " . $_GET['Service_id'];
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		//echo '<div style="font-size:50;color:blue">SERVICE DELETED! </div>';
		header('location:service.php');
	} else {
		echo mysqli_error();
	}
	//mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
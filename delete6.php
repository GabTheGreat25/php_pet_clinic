<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Transaction
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM transaction WHERE Transaction_id  = " . $_GET['Transaction_id'];
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		//echo '<div style="font-size:50;color:blue">SERVICE DELETED! </div>';
		header('location:index.php');
	} else {
		echo mysqli_error($conn);
	}
	//mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
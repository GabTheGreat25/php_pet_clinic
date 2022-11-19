<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Consultation
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM consultation WHERE Consultation_id = " . $_GET['Consultation_id'];
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
<!DOCTYPE html PUBLIC>
<html>

<head>
	<title>
		Delete A Pet
	</title>
</head>

<body style="background-color:#aaa69d" ;>

	<?php
	include "includes/config.php";
	$sql = "DELETE FROM pet WHERE Pet_id = " . $_GET['Pet_id'];
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if ($result == true) {
		//echo '<div style="font-size:50;color:blue">PET DELETED! </div>';
		header('location:pets.php');
	} else {
		echo mysqli_error($conn);
	}
	//mysqli_free_result($result);
	mysqli_close($conn);
	?>
</body>

</html>
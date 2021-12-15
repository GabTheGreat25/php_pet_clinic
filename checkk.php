<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] =='POST') {
require ('includes/checking.php');
require ('includes/config.php');
list ($check, $data) = check_login ($conn, $_POST['First_name'], $_POST['Last_name']);
if ($check) { // OK!
session_start();
$_SESSION['Cust_id'] = $data['Cust_id'];
$_SESSION['First_name'] = $data['First_name'];
redirect_user('checkkk.php');
} else {
$errors = $data;
}
mysqli_close($conn);
}
include ('check.php');
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] =='POST') {
require ('includes/login_functions.inc.php');
require ('includes/config.php');
list ($check, $data) = check_login ($conn, $_POST['Email'], $_POST['Password']);
if ($check) { // OK!
session_start();
$_SESSION['Employee_id'] = $data['Employee_id'];
$_SESSION['First_name'] = $data['First_name'];
redirect_user('loggedin.php');
} else {
$errors = $data;
}
mysqli_close($conn);
}
include ('login_page.php');

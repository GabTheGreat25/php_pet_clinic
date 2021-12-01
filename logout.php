<?php
//session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['Employee_id'])) {
 require ('includes/login_functions.inc.php');
 redirect_user();
} else {
 //$_SESSION = array();
setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
include ('login.php');
session_destroy();
}
?>

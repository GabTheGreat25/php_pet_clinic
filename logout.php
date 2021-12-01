<?php # Script 12.6 - logout.php
session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['Employee_id'])) {
 require ('includes/login_functions.inc.php');
 redirect_user();
} else {
 //$_SESSION = array();
setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
$page_title = 'Logged Out!';
include ('index.php');
echo "<h1>Logged Out!</h1>
<p>You are now logged out, {$_SESSION['First_name']}!</p>";
session_destroy();
}
?>

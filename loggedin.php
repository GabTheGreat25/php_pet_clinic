<?php 
session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['Employee_id'])) {
require ('includes/login_functions.inc.php');
redirect_user();
}
include ('index.php');
echo "<h1>Logged In!</h1> <p>You are now logged in, {$_SESSION['First_name']}!</p>";

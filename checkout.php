<?php
session_start();
include("./includes/config.php");
 if (!isset($_SESSION['Employee_id']) ) {
 require ('./includes/login_functions.inc.php');
  redirect_user(); // pagnarollback babalik kase naka ! gento isset
}
//print_r($_SESSION);
 //try
 {mysqli_query($conn,'START TRANSACTION');

$querry = 'INSERT INTO transaction(Employee_id, Service_id) VALUES ( ?, ?)';
$Employee_id =  $_SESSION['Employee_id'];
$flag = true;

// print_r($_SESSION["cart_products"]);
foreach ($_SESSION["cart"] as $cart_itm){
//set variables to use in content below
$Service_name = $cart_itm["Name"];
$Cost = $cart_itm["Price"];
$Service_id = $cart_itm["Service_id"];
//$Cust_id = $cart_itm["Cust_id"];

$stmt1 = mysqli_prepare($conn, $querry);
mysqli_stmt_bind_param($stmt1, 'ii', $Employee_id, $Service_id);
mysqli_stmt_execute($stmt1);

 if($flag == true){
 mysqli_commit($conn);
  unset($_SESSION['cart']);
  echo "Success!";
}
else {
 mysqli_rollback($conn);
 echo "Fail";
 }
}
}
?>
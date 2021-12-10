<?php
session_start();
//error_reporting(0);
include("./includes/config.php");
if (!isset($_SESSION['Employee_id'])) {
  require('./includes/login_functions.inc.php');
  redirect_user(); //pagnarollback
}
//print_r($_SESSION);
//try
else {
  mysqli_query($conn, 'START TRANSACTION');

  $querry = 'INSERT INTO transaction(Employee_id,Schedule) VALUES (?, NOW())';
  $Employee_id =  $_SESSION['Employee_id'];
  $flag = true;

  $stmt1 = mysqli_prepare($conn, $querry);
  mysqli_stmt_bind_param($stmt1, 'i', $Employee_id);
  mysqli_stmt_execute($stmt1);

  $Transaction_id = mysqli_insert_id($conn);
  $querry2 = 'INSERT INTO transaction_line(Transaction_id ,Service_id, Pet_id)VALUES (?, ?, ?)';
  //$querry2 = 'INSERT INTO transaction_line(Transaction_id ,Service_id)VALUES (?, ?)';
  $Pet_id = rand(1,3);
  $stmt2 = mysqli_prepare($conn, $querry2);
  //mysqli_stmt_bind_param($stmt2, 'ii', $Transaction_id, $Service_id);
  mysqli_stmt_bind_param($stmt2, 'iii', $Transaction_id, $Service_id, $Pet_id);

  // print_r($_SESSION["cart_products"]);
  foreach ($_SESSION["cart"] as $cart_itm) {
    //set variables to use in content below
    $Service_name = $cart_itm["Name"];
    $Cost = $cart_itm["Price"];
    $Service_id = $cart_itm["Service_id"];

    //$Name = $cart_itm["Pet_name"];
    //$Pet_id = $cart_itm["Pet_id"];
    //$Cust_id = $cart_itm["Cust_id"];
    mysqli_stmt_execute($stmt2);

    if ((mysqli_stmt_affected_rows($stmt2) > 0)) {

      if ($flag == true) {
        mysqli_commit($conn);
        //unset($_SESSION['cart']);
        echo "success";
      } else {
        mysqli_rollback($conn);
        echo "fail";
      }
    }
  }
}

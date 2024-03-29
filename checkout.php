<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt</title>
    </head>
<body style="background-color:#aaa69d" ;>

<?php
session_start();
error_reporting(0);
include("./includes/config.php");
if (!isset($_SESSION['Employee_id'])) {
  require('./includes/login_functions.inc.php');
  redirect_user(); //pagnarollback
}
//print_r($_SESSION);
//try
else {
  session_start();
  mysqli_query($conn, 'START TRANSACTION');

  $querry = 'INSERT INTO transaction(Employee_id,Schedule) VALUES (?,NOW())';
  $Employee_id =  $_SESSION['Employee_id'];
  $flag = true;

  $stmt1 = mysqli_prepare($conn, $querry);
  mysqli_stmt_bind_param($stmt1, 'i', $Employee_id);

     mysqli_stmt_execute($stmt1);

  $Transaction_id = mysqli_insert_id($conn);
  $querry2 = 'INSERT INTO transaction_line(Transaction_id ,Pet_id , Service_id)VALUES (?, ?, ?)';
  $stmt2 = mysqli_prepare($conn, $querry2);
  mysqli_stmt_bind_param($stmt2, 'iii', $Transaction_id, $Pet_id, $Service_id);
  
  foreach ($_SESSION["carts"] as $cart_itm) {
    $Name = $cart_itm["Pet_name"];
    $Pet_id = $cart_itm["Pet_id"];

  foreach ($_SESSION["cart"] as $cart_itm) {
    $Service_name = $cart_itm["Name"];
    $Cost = $cart_itm["Price"];
    $Service_id = $cart_itm["Service_id"];

    mysqli_stmt_execute($stmt2);

    if ((mysqli_stmt_affected_rows($stmt2) > 0)) {

      if ($flag == true) {
        mysqli_commit($conn);
        //echo "success";
        //header('Location: index.php');
      } else {
        mysqli_rollback($conn);
        echo "fail";
      }
    }
  }
}
unset($_SESSION['carts']);
unset($_SESSION['cart']);
}

echo '<p class="centered">YOUR RECEIPT
                <br>Pet Clinic<br></p>';

$Delimeter = 'CALL grooming2('.$Transaction_id.')';
          $start = mysqli_query($conn, $Delimeter);
while ($rows = mysqli_fetch_array($start))
          {

          echo '<link rel="stylesheet" href="./resibo/style.css">
<div class="ticket">
            <table>
                <tbody>
                <thead>
                <h4>Date Service: '.$rows['Schedule'].'</h4>
                <h5>Owner Name: '.$rows['first_name'].' '.$rows['last_name'].'</h5>
                <h5>Groomer: '.$rows['First_name'].' '.$rows['Last_name'].'</h5>
                  <tr>
                    <th>Groom Service</th>
                    <th>Pet Name</th>
                    <th>Fee</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      '.$rows['Service_name'].'
                    </td>
                    <td>
                      '.$rows['Name'].'
                    </td>
                    <td>₱'.$rows['Cost'].'</td>
                  </tr>
                </tbody>
            </table>
            <br></br>
        </div>';
          }
          echo '<p class="centered"><button><strong>Print</strong></button></p>';
?>
</body>
</html>

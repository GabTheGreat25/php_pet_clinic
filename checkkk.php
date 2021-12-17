<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pick A Pet</title>
    <link href="./transaction/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?php
    if (isset($_SESSION["carts"]) && count($_SESSION["carts"]) > 0) {
        echo '<div class="cart-view-table-back" id="view-cart">'; //first table kaya ito inuna at di pwede ilagay sa huli kasi di lalabas
        echo '<h3>Your Choosen Pets</h3>';
        echo '<form method="POST" action="try.php">'; //gumamit post
        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
        echo '<tbody>';

        $b = 0;
        foreach ($_SESSION["carts"] as $cart_itm) {
            //var_dump($cart_itm);
            //exit();
            $Name = $cart_itm["Pet_name"];
            $Pet_id = $cart_itm["Pet_id"];
            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>' . $Name . '</td>';
            //echo '<td><input type="text" value="'.$Cust_id.'"></td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="' . $Pet_id . '" /> Remove</td>';
            echo '</tr>';
            //$subtotal = ($product_price * $product_qty);
            //$total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<button type="submit">Update</button>
        <a href="Transac.php" class="button">Go To Service</a>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';

        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
        echo '</form>';
        echo '</div>';
    }
    ?>

    <?php
    //var_dump($_SESSION);
    if (isset($_POST['submit'])) { 
        $_SESSION['Cust_id'] = $_POST['Cust_id'];
        $_SESSION['Employee_id'] = $_POST['Employee_id'];
        } 
        $Cust_id = $_SESSION['Cust_id'];
    include "includes/config.php";

    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $sql = "SELECT p.Pet_id AS Pet_id, p.Name AS Name, p.Pet_pic AS Pet_pic FROM pet p INNER JOIN customer c ON p.Cust_id = c.Cust_id WHERE p.Cust_id = $Cust_id";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo '<ul class="products">';
        while ($row = mysqli_fetch_array($result)) {
            echo '
    <li class="product">
        <form method="POST" action="try.php">
            <div class="product-thumb"><img src="'.$row['Pet_pic'].'" width=180px height=200px></div>
            <div class="product-info">Name:'.$row['Name'].'
            <br></br>
            <input type="hidden" name="Pet_id" value="'.$row['Pet_id'].'" />
            <input type="hidden" name="type" value="add" />
            <input type="hidden" name="return_url" value="{$current_url}" />
            <div align="center"><button type="  " class="add_to_cart">Pick A Pet</button></div>
            </div></div>
         </form>
    </li>
    ';
        }
        echo '</ul>';
    }
    ?>
</body>

</html>
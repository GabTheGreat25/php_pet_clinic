<?php
error_reporting(0);
session_start();
include("./includes/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Services</title>
    <link href="./transaction/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <strong>
        <h1 align="center">Types Of Services</h1>
    </strong>
    <?php
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        echo '<div class="cart-view-table-front" id="view-cart">'; //first table kaya ito inuna at di pwede ilagay sa huli kasi di lalabas
        echo '<h3>Your Pick Services</h3>';
        echo '<form method="POST" action="transac_update.php">'; //gumamit post
        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
        echo '<tbody>';
        $total = 0;
        $b = 0;
        foreach ($_SESSION["cart"] as $cart_itm) {
            //var_dump($cart_itm);
            //exit();
           // $Name = $cart_itm["Pet_name"];
            $Service_name = $cart_itm["Name"];
            $Cost = $cart_itm["Price"]; //dun sa maliit na table kaya tinawag siya sa cart_update gets ko na ren jusqo HAHA
           // $Pet_id = $cart_itm["Pet_id"];
            $Service_id = $cart_itm["Service_id"];
            //$Cust_id = $cart_itm["Cust_id"];
            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>' . $Name .''. $Service_name . '</td>';
            //echo '<td><input type="text" value="'.$Cust_id.'"></td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="' . $Service_id . '" /> Remove</td>';
            echo '</tr>';
            //$subtotal = ($product_price * $product_qty);
            //$total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<button type="submit">Update</button>
    <a href="view_transac.php" class="button">Checkout</a>
    <a href="checkkk.php" class="button">Go Back</a>';
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
    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $results = mysqli_query($conn, "select* from service");
    if ($results) {
        $services = '<ul class="products">';
        while ($row = mysqli_fetch_array($results)) {
            $services .= <<<EUT
        <li class="product">
            <form method="POST" action="transac_update.php">
                <div class="product-content"><h3>{$row['Service_name']}</h3>
                <div class="product-thumb"><img width=200px height=200px src={$row['Haircut_pic']}></div>
                <div class="product-info">
                Price {$row['Cost']}
                <br></br>
                <input type="hidden" name="Service_id" value="{$row['Service_id']}" />
                <input type="hidden" name="type" value="add" /> 
                <input type="hidden" name="return_url" value="{$current_url}" />
                <div align="center"><button type="  " class="add_to_cart">Add</button></div>
                </div></div>
             </form>
        </li>
EUT;
        }
        $services .= '</ul>';
        echo $services;
    }
    ?>
</body>

</html>
<?php
session_start();
include("./includes/config.php");
?>
<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>View shopping cart</title>
        <link href="./transaction/style.css" rel="stylesheet" type="text/css">
</head>

<body>
        <h1 align="center">View Cart</h1>
        <div class="cart-view-table-back">
                <form method="POST" action="transac_update.php">
                        <table width="150%" cellpadding="6" cellspacing="2">
                                <thead>
                                        <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Remove</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        
                                        <?php
                                        //echo "<pre>";
                                        //print_r($_SESSION);
                                        //echo "</pre>";
                                        if (isset($_SESSION["cart"])) //check session var
                                        {
                                                $total = 0; //set initial total value
                                                $b = 0; //var for zebra stripe table 
                                                foreach ($_SESSION["cart"] as $cart_itm) {
                                                        //set variables to use in content below
                                                        $Service_name = $cart_itm["Name"];
                                                        $Cost = $cart_itm["Price"];
                                                        $Service_id = $cart_itm["Service_id"];
                                                        $subtotal = ($Cost);
                                                        $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //class for zebra stripe 
                                                        echo '<tr class="' . $bg_color . '">';
                                                        echo '<td>' . $Service_name . '</td>';
                                                        echo '<td>' . $Cost . '</td>';
                                                        //echo '<td>'.$subtotal.'</td>';
                                                        echo '<td><input type="checkbox" name="remove_code[]" value="' . $Service_id . '" /></td>';
                                                        echo '</tr>';
                                                        $total = ($total + $subtotal); //add subtotal to total var
                                                }
                                        }
                                        ?>
                                        <tr>
                                                <td colspan="5"><span style="float:right;text-align: right;">Amount Payable : <?php echo sprintf("%01.2f", $total); ?></span></td>
                                        </tr>
                                        <tr>
                                                <td colspan="5"><a href="transac.php" class="button">Add More Services</a>
                                                        <button type="submit">Update</button>
                                                </td>
                                                <td colspan="5"><a href="checkout.php" class="button">Checkout</a></td>
                                        </tr>
                                </tbody>
                        </table>
                        <input type="hidden" name="return_url" value="<?php
                                                                        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                                                                        echo $current_url; ?>" />
                </form>
        </div>
</body>

</html>
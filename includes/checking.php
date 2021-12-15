<?php
function redirect_user($page = 'check.php')
{

    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    // Remove any trailing slashes:
    $url = rtrim($url, '/\\');
    // Add the page:
    $url .= '/' . $page;
    // Redirect the user:
    header("Location: $url");
    exit();
}

function check_login($conn, $First_name = '', $Last_name = '')
{
    $errors = array(); // Initialize error array.
    // Validate the email address:
    if (empty($First_name)) {
        $errors[] = 'You forgot to enter your First_name.';
    } else {
        $f = mysqli_real_escape_string($conn, trim($First_name));
    }
    // Validate the password:
    if (empty($Last_name)) {
        $errors[] = 'You forgot to enter your Last_name.';
    } else {
        $l = mysqli_real_escape_string($conn, trim($Last_name));
    }
    if (empty($errors)) { // If everything's OK.
        // Retrieve the user_id and first_name for that email/password combination:
        $q = "SELECT Cust_id, First_name, Last_name FROM customer WHERE First_name='$f' AND Last_name='$l'";
        $r = @mysqli_query($conn, $q); // Run the query.
        // Check the result:
        if (mysqli_num_rows($r) == 1) {
            // Fetch the record:
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            // Return true and the record:
            return array(true, $row);
        } else { // Not a match!
            $errors[] = 'Your First name and Last name you entered do not match those on file.';
        }
    } // End of empty($errors) IF.
    // Return false and the errors:
    return array(false, $errors);
} // End of check_login() function.
<?php
function redirect_user($page = 'login_page.php')
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

function check_login($conn, $Email = '', $Password = '')
{
    $errors = array(); // Initialize error array.
    // Validate the email address:
    if (empty($Email)) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($conn, trim($Email));
    }
    // Validate the password:
    if (empty($Password)) {
        $errors[] = 'You forgot to enter your password.';
    } else {
        $p = mysqli_real_escape_string($conn, trim($Password));
    }
    if (empty($errors)) { // If everything's OK.
        // Retrieve the user_id and first_name for that email/password combination:
        $q = "SELECT Employee_id, First_name FROM employee WHERE Email='$e' AND Password=SHA1('$p')";
        $r = @mysqli_query($conn, $q); // Run the query.
        // Check the result:
        if (mysqli_num_rows($r) == 1) {
            // Fetch the record:
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            // Return true and the record:
            return array(true, $row);
        } else { // Not a match!
            $errors[] = 'The email address and password entered do not match those on file.';
        }
    } // End of empty($errors) IF.
    // Return false and the errors:
    return array(false, $errors);
} // End of check_login() function.
 <!DOCTYPE html PUBLIC>
 <html>

 <head>
   <title>Log In</title>
   <link rel="stylesheet" href="./includes/style.css">
 </head>

 <body>

   <?php
   
    // Print any error messages, if they exist:
    if (isset($errors) && !empty($errors)) {
      echo '<h1>Error!</h1>
 <p class="error">The following error(s) occurred:<br />';
      foreach ($errors as $msg) {
        echo " - $msg<br />\n";
      }
      echo '</p><p>Please try again.</p>';
    }

    ?>
   <form class="box" action="login.php" method="POST">
    <h1>Login</h1>
     <p>Email Address: <input type="text" name="Email" placeholder="Username"></p>
     <p>Password: <input type="password" name="Password" placeholder="Password"></p>
     <input type="submit" name="submit" value="Login">
     <a href="Create2.php" class="button">Sign Up Here!</a>
   </form>
 </body>

 </html>
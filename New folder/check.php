<!DOCTYPE html PUBLIC>
 <html>

 <head>
   <title>Checking</title>
   <link rel="stylesheet" href="./cust/style.css">
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
   <form class="box" action="checkk.php" method="POST">
     <h1>Checking</h1>
     <p>First Name: <input type="text" name="First_name"></p>
     <p>Last Name: <input type="text" name="Last_name"></p>
     <input type="submit" name="submit" value="Check">
     <a href="Create.php" class="button">Make an account Here!</a>
   </form>
 </body>

 </html>
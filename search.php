<?php
    include "includes/config.php";

if(isset($_POST['search']))
{
    // id to search
    $Pet_id  = $_POST['Pet_id'];
    
    // mysql search query
    $query = "select p.Pet_id,c.Date_of_Consultation,c.Disease_Injuries,c.Comments  from pet p INNER JOIN consultation c ON p.Pet_id = c.Pet_id WHERE p.Pet_id = $Pet_id LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $Date_of_Consultation = $row['Date_of_Consultation'];
        $Disease_Injuries = $row['Disease_Injuries'];
        $Comments = $row['Comments'];
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "Undifined ID";
            $Date_of_Consultation = "";
            $Disease_Injuries = "";
            $Comments = "";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
}

// in the first time inputs are empty
else{
    $Date_of_Consultation = "";
    $Disease_Injuries = "";
    $Comments = "";
}


?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP FIND DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

    <form action="search.php" method="post">

        Pet Id:<input type="text" name="Pet_id"><br><br>

        Date_of_Consultation:<input type="text" name="Date_of_Consultation" value="<?php echo $Date_of_Consultation;?>"><br>
<br>

        Disease_Injuries:<input type="text" name="Disease_Injuries" value="<?php echo $Disease_Injuries;?>"><br><br>

        Comments:<input type="text" name="Comments" value="<?php echo $Comments;?>"><br><br>

        <input type="submit" name="search" value="Find">

           </form>

    </body>

</html>
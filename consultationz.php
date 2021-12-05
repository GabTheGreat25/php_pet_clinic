<!DOCTYPE html>
<html lang="en">
<head>
    <title>	
        Consultation
	</title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    
</head>
<body style = "background: url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size: 100% ; ">
    <header>
        <div class="logo">
            <h1>Pet Clinic</h1>
        </div>
        <button><a href = "consulting.php"> <h4>Consult Your Pet</h4>  </a></button>
        <nav>
            <ul>
                <button> <a href = "index.php"><h4>Home</h4></a></button>
                <button> <a href = "pets.php"><h4>Pets</h4></a></button>
                <button><a href = "customer.php"><h4>Customers</h4></a></button>
                <button><a href = "employee.php"><h4>Employee</h4></a></button>
                <button><a href = "service.php"><h4>Service</h4></a></button>
                <button><a href = "consultationz.php"><h4>consultation</h4></a></button>
            </ul>
        </nav>
        <button><?php if ( (isset($_SESSION['Employee_id'])) && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) {
echo '<a href="logout.php"><h3>Logout</h3></a>';
} else {
echo '<a href="login.php"><h3>Login</h3></a>';
}
?>
</button>
    </header>

<?php
	session_start();
error_reporting(0);
include "includes/config.php";
if (!isset($_SESSION['Employee_id'])){
    require ('includes/login_functions.inc.php');
 echo "<p>please log in to check consultations.</p>";
 //echo "<td align='center'><a href='index.php' role='button'> <font color='brightgreek'><h2>Go Back</h2></font></a></td>";
}
elseif(isset($_POST['consultationz']))
{
    // id to search
    $Consultation_id  = $_POST['Consultation_id'];
    
    // mysql search query
    $query = "select p.Pet_id,p.Name,c.Consultation_id,c.Date_of_Consultation,c.Disease_Injuries,c.Comments from pet p INNER JOIN consultation c ON p.Pet_id = c.Pet_id WHERE c.Consultation_id = $Consultation_id LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $Name = $row['Name'];
        $Date_of_Consultation = $row['Date_of_Consultation'];
        $Disease_Injuries = $row['Disease_Injuries'];
        $Comments = $row['Comments'];
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
            $Name = "No Data";
            $Date_of_Consultation = "No Data";
            $Disease_Injuries = "No Data";
            $Comments = "No Data";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($conn);
    
}

// in the first time inputs are empty
else{
    $Name = "";
    $Date_of_Consultation = "";
    $Disease_Injuries = "";
    $Comments = "";
}

?>
    <form action="consultationz.php" method="POST">
    <div class="tbl-container">

        Consultation Id:<input type="number" max="100" min="1" name="Consultation_id"  value="<?php echo $Consultation_id;?>"><br><br>

        Name:<input type="text" name="Name" readonly value="<?php echo $Name;?>"><br><br>

        Date_of_Consultation:<input type="text" name="Date_of_Consultation" readonly value="<?php echo $Date_of_Consultation;?>"><br><br>

        Disease_Injuries:<input type="text" name="Disease_Injuries" readonly value="<?php echo $Disease_Injuries;?>"><br><br>

        Comments: <textarea><?php echo $Comments;?></textarea><br><br>

        <input type="submit" name="consultationz" value="Find">

           </form>
           </div>
</body>
</html>
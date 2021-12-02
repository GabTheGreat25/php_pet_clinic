<?php
    include "includes/config.php";

    mysqli_query($conn,'START TRANSACTION');
    $sql = 'INSERT INTO consultation(Employee_id, Pet_id, Date_of_Consultation, Disease_Injuries, Comments) VALUES (?, ?, ?, ?, ?)';
    $flag = true;
    
    if ($_POST['submit'] ==  "Save"){
    $Employee_id  = $_POST['Employee_id'];
    $Pet_id = $_POST['Pet_id'];
    $Date_of_Consultation = $_POST['Date_of_Consultation'];
    $Disease_Injuries = $_POST['Disease_Injuries'];
    $Comments = $_POST['Comments'];

    $consult = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($consult, 'iisss', $Employee_id, $Pet_id,$Date_of_Consultation, $Disease_Injuries, $Comments);
    mysqli_stmt_execute($consult);


      if( (mysqli_stmt_affected_rows($consult) > 0)){
      if($flag == true){
        mysqli_commit($conn);
        header('Location: consultationz.php');
       }
       }
       else {
        mysqli_rollback($conn);
        echo "Fail";
        //echo "<td align='center'><a href='index.php' role='button'> <font color='brightgreek'><h2>Go Back</h2></font></a></td>";
       }
    }
?>
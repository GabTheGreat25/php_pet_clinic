<?php
 include "includes/config.php";
$statement = $pdo->prepare("SELECT p.Pet_id,p.Name,c.Date_of_Consultation,c.Disease_Injuries,c.Comments FROM pet p INNER JOIN consultation c ON p.Pet_id = c.Pet_id WHERE p.pet_id LIKE ?");
$statement->execute([
"%".$_POST['find']."%"
]);
$results = $statement->fetchAll();
?>
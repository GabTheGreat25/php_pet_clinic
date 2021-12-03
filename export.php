<?php
include "includes/config.php";
$tables = array();
$result = mysqli_query($conn,"SHOW FULL TABLES");
while($row = mysqli_fetch_row($result)){
  $tables[] = $row[0];
}
$return = '';
foreach($tables as $table){
  $result = mysqli_query($conn,"select * from ".$table);
  $num_fields = mysqli_num_fields($result);
  
  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($conn,"SHOW CREATE TABLE ".$table));
  $return .= "\n\n".$row2[1].";\n\n";
  
  for($parent=0; $parent<$num_fields; $parent++){
    while($row = mysqli_fetch_row($result)){
      $return .= "INSERT INTO ".$table." VALUES(";

      for($child=0; $child<$num_fields; $child++){
        $row[$child] = addslashes($row[$child]);
        if(isset($row[$child])){ $return .= '"'.$row[$child].'"';}
        else{ $return .= '""';}
        if($child<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $return .= "\n\n\n";
}

$handle = fopen("backup.sql","w+");
fwrite($handle,$return);
fclose($handle);
echo "Successfully backed up";
echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";
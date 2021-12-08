<?php
include "includes/config.php";
$filename = 'backup.sql';
$handle = fopen($filename, "r+");
$contents = fread($handle, filesize($filename));
$sql = explode(';', $contents);
foreach ($sql as $query) {
  $result = mysqli_query($conn, $query);
  if ($result) {
    echo '<tr><td><br></td></tr>';
    echo '<tr><td>' . $query . ' <b>SUCCESS</b></td></tr>';
    echo '<tr><td><br></td></tr>';
  }
}
fclose($handle);
echo nl2br("\n");
echo 'Successfully imported';
echo "<td align='center'><a href='index.php' role='button'> <h4>Go Back</h4></a></td>";

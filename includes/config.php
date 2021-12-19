<?php #mysqli_connect.php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_CHARSET', 'utf8');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'mydb_gabz');
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to MySQL: ' . mysqli_connect_error()); 


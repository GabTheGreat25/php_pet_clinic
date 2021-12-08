<?php #mysqli_connect.php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_CHARSET', 'utf8');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'mydb_gabz');
$conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to MySQL: ' . mysqli_connect_error()); 

$pdo = new PDO(
    "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,DB_USER,DB_PASSWORD,[PDO:: ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
//echo "Database ", DB_NAME, " is selected.\n";

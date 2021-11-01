<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'db');
define('DB_USERNAME', 'MYSQL_USER');
define('DB_PASSWORD', 'MYSQL_PASSWORD');
define('DB_NAME', 'MYSQL_DATABASE');

// $conn = new mysqli($host, $user, $pass, $mydatabase);

// $host = 'db';
// // Database use name
// $user = 'MYSQL_USER';

// //database user password
// $pass = 'MYSQL_PASSWORD';

// // database name
// $mydatabase = 'MYSQL_DATABASE';
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
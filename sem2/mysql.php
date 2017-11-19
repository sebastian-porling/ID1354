<?php
$user = 'root';
$password = 'root';
$db = 'ID1354';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
// Check connection
if (!$success) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
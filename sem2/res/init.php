<?php
include_once('config.php');

$conn = new mysqli($DB_HOST, 
   $DB_USER, 
   $DB_PASS, 
   $DB_NAME);
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ID1354";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

include_once('func/func.php');
?>
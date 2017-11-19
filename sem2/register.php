<?php

session_start();


include("res/init.php");

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
    if ($conn->query($sql) === TRUE) {
    $conn->close();
    $_SESSION['register'] = 'true';
    $url = "location: " . $_SERVER['HTTP_REFERER'];
    header($url);
    exit();
    } else {
    $conn->close();
    $_SESSION['register'] = 'false';
    $url = "location: " . $_SERVER['HTTP_REFERER'];
    header($url);
    exit();
    }
    $conn->close();
    $url = "location: " . $_SERVER['HTTP_REFERER'];
    header($url);
    exit();
    
}

?>
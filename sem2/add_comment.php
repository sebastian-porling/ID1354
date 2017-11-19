<?php
session_start();

if(!($_POST['comment'] == "") AND isset($_SESSION['username'])){
    include("res/init.php");
    $comment = $_POST['comment'];
    $user = $_SESSION['username'];
    $site = $_POST['site'];
    $sql = "INSERT INTO comments (username, comment, time, recipe) VALUES ('$user', '$comment', CURDATE(), '$site')";
    $result = $conn->query($sql);
    if($result == TRUE){
        $url = "location: " . $_SERVER['HTTP_REFERER'];
        header($url);
        exit();
    }else{
        echo '<script>alert("Something went wrong");</script>';
    }
    $conn->close();
}else{
    $conn->close();
    echo '<script>alert("You forgot to write a comment or you are not logged in.");</script>';
    $url = "location: " . $_SERVER['HTTP_REFERER'];
    header($url);
    exit();
}

?>
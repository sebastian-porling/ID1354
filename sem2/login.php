<?php
session_start();


include("res/init.php");

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users where username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $url = "location: " . $_SERVER['HTTP_REFERER'];
            $conn->close();
            header($url);
            exit();
        }
    } else {
        $_SESSION['login'] = 'false';
        $url = "location: " . $_SERVER['HTTP_REFERER'];
        $conn->close();
        header($url);
        exit();
    }
    $conn->close();
}



?>

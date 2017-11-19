<?php 

session_start();

if(isset($_GET['id']) AND isset($_SESSION['username'])){
    include("res/init.php");
    $commentId = $_GET['id'];
    $user = $_SESSION['username'];
    $sql = "DELETE FROM comments WHERE id='$commentId' AND username='$user'";
    
    $result = $conn->query($sql);
    if($result == TRUE){
        $conn->close();
        $_SESSION['deleted'] = 'true';
        $url = "location: " . $_SERVER['HTTP_REFERER'];
        header($url);
        exit();
    }else{
        $conn->close();
        $_SESSION['deleted'] = 'false';
        $url = "location: " . $_SERVER['HTTP_REFERER'] . '&deleted=false';
        header($url);
        exit();
    }
    
    $conn->close();
}else{
    echo '<script>alert("You are not logged in or there is no comment to delete.");</script>';
    $url = "location: " . $_SERVER['HTTP_REFERER'];
    header($url);
    exit();
}

?>
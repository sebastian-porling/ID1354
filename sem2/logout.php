<?php
session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();

$url = "location: " . $_SERVER['HTTP_REFERER'];
header($url);
exit();

?> 
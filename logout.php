<?php

//Destroy everything and logout
$view = new stdClass();
$view->pageTitle = 'Logout';

session_start();

if (isset($_COOKIE['username'])) {
    setcookie('username', $_SESSION['username'], time() - 3600);
}
session_destroy();
header("location:index.php");
exit();


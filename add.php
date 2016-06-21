<?php

if (isset($_COOKIE['username']) && $_COOKIE['username'] == 'admin' or isset($_COOKIE['username']) && $_COOKIE['username'] == 'ste' or isset($_COOKIE['username']) && $_COOKIE['username'] == 'charlie') {
    
}
else {
    header('Location:index.php');
}

session_start();
require_once('Models/UserDataSet.php');
require_once ('Models/LoginDataSet.php');
require_once('Models/ProductDataSet.php');
$view = new stdClass();
$view->pageTitle = 'Edit a Product';
//Change footer if logged in
if (isset($_COOKIE['username'])) {
    $loggedInAs = "You are currently logged in as " . $_COOKIE['username'] . ". Click <a href='logout.php'>here</a> to logout.";
} else {
    $loggedInAs = 'You are not currently logged in.';
}
//Fetch all accounts
$userDataSet = new userDataSet();
$view->userDataSet = $userDataSet->fetchAllAccounts();
//Query strings for category filters 
if (isset($_SERVER['QUERY_STRING']))
{
 if ($_SERVER['QUERY_STRING'] == 'Gaming'){
             header("Location:index.php?Gaming");
        }
  if ($_SERVER['QUERY_STRING'] == 'Entertainment'){
             header("Location:index.php?Entertainment");
        }
        if ($_SERVER['QUERY_STRING'] == 'Sports'){
             header("Location:index.php?Sports");
        }
        if ($_SERVER['QUERY_STRING'] == 'Gadgets'){
             header("Location:index.php?Gadgets");
        }
        if ($_SERVER['QUERY_STRING'] == 'Novelty'){
             header("Location:index.php?Novelty");
        }
        if ($_SERVER['QUERY_STRING'] == 'Foodndrink'){
             header("Location:index.php?Foodndrink");
        }
}

require_once('Views/add.phtml');


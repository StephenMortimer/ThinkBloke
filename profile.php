<?php

if (isset($_COOKIE['username'])) {


    require_once('Models/UserDataSet.php');
    require_once ('Models/LoginDataSet.php');
    require_once('Models/ProductDataSet.php');

    if (isset($_COOKIE['username'])) {
        $loggedInAs = "You are currently logged in as " . $_COOKIE['username'] . ". Click <a href='logout.php'>here</a> to logout.";
        $username = $_COOKIE['username'];
    } else {
        $loggedInAs = 'You are not currently logged in.';
    }

    $view = new stdClass();
//Change email
    if (isset($_POST["submitEmail"])) {
        $userDataSet = new userDataSet();
        $userDataSet->updateEmail($_POST['existingEmail'], $_POST['verifyEmail']);
        $changed = "You have successfully changed your email.";
    }
//Change password
    if (isset($_POST["submitPassword"])) {
        $userDataSet = new userDataSet();
        $userDataSet->updatePassword($_POST['existing'], $_POST['verify']);
        $changed = "You have successfully changed your Password.";
    }
//Get all likes
    $productDataSet = new productDataSet();
    $view->productDataSet = $productDataSet->fetchAllByLikes();

//Get all dislikes
    $productDataSet2 = new productDataSet();
    $view->productDataSet2 = $productDataSet2->fetchAllByDislikes();
//Get Profile Picture
    $userDataSet = new userDataSet();
    $view->userDataSet = $userDataSet->fetchProfilePicture();
//Get Personalised
    $userDataSet2 = new userDataSet();
    $view->userDataSet2 = $userDataSet2->fetchPersonalised();
//If clicked, remove like
    if (isset($_POST["removeLike"])) {
        $productDataSet = new productDataSet();
        $productDataSet->removeLike();
    }
//If clicked, remove dislikes
    if (isset($_POST["removeDislike"])) {
        $productDataSet = new productDataSet();
        $productDataSet->removeDislike();
    }


//Queries for category filters
    if (isset($_SERVER['QUERY_STRING'])) {
        if ($_SERVER['QUERY_STRING'] == 'Gaming') {
            header("Location:index.php?Gaming");
        }
        if ($_SERVER['QUERY_STRING'] == 'Entertainment') {
            header("Location:index.php?Entertainment");
        }
        if ($_SERVER['QUERY_STRING'] == 'Sports') {
            header("Location:index.php?Sports");
        }
        if ($_SERVER['QUERY_STRING'] == 'Gadgets') {
            header("Location:index.php?Gadgets");
        }
        if ($_SERVER['QUERY_STRING'] == 'Novelty') {
            header("Location:index.php?Novelty");
        }
        if ($_SERVER['QUERY_STRING'] == 'Food%20&%20Drink') {
            header("Location:index.php?Foodndrink");
        }
        if ($_SERVER['QUERY_STRING'] == 'Foodndrink') {
            header("Location:index.php?Foodndrink");
        }
    }
    require_once('Views/profile.phtml');
} else {
    header("Location:index.php");
}
?>
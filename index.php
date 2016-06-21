<?php
session_start();
require_once('Models/UserDataSet.php');
require_once ('Models/LoginDataSet.php');
require_once('Models/ProductDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Homepage';

$userDataSet = new userDataSet();
$view->userDataSet = $userDataSet->fetchAllAccounts();

$indexTitle = "All Products";
$loginFail = "";
$registered = "";
$likeTitle = "Based on your likes we suggest...";



if (isset($_COOKIE['username'])) {
    $loggedInAs = "You are currently logged in as " . $_COOKIE['username'] . ". Click <a href='logout.php'>here</a> to logout.";
} else {
    $loggedInAs = 'You are not currently logged in.';
}

if (isset($_POST["dislike"])) {
    $productDataSet = new productDataSet();
    $productDataSet->addDislike();
   
}

if (isset($_POST['remove'])) {
    $productDataSet = new productDataSet();
    $productDataSet->deleteProduct();
}


if (isset($_POST['submitR'])) {
    $userDataSet = new userDataSet();
    $view->userDataSet = $userDataSet->checkEmail($_POST['email']);
    $rows = $userDataSet::$rows;    
    if ($rows > 0) {
       $registered = '<div id ="fade" class="alert alert-danger" role="alert">An account with this Email Address already exists.</div>';
    } else {
        $userDataSet = new userDataSet();
        $userDataSet->createAccount($_POST['email'], $_POST['RegUsername'], $_POST['ConPassword']);
        $view->userDataSet = $userDataSet->fetchAllAccounts();
        $registered = '<div id="fade" class="alert alert-success" role="alert">You have successfully created an account!</div>';
    }
}

if (isset($_POST['submitL'])) {
    $loginDataSet = new loginDataSet();
    $view->loginDataSet = $loginDataSet->fetchAccountDetails($_POST['username'], $_POST['password']);

    if (count($view->loginDataSet) == 1) {
        setcookie('username', $_SESSION['username'], time() + 3600);
        $_SESSION['username'] = $_POST['username'] && $_SESSION['password'] = $_POST['password'];
        $loginFail = '';
        header('Location:redir.php');
    } else {
        
        $loginFail = '<div id="fade" class="alert alert-danger" role="alert">Error logging in. Check your username and password are correct.</div>';
    }
}

    $productDataSet = new productDataSet();
$view->productDataSet = $productDataSet->fetchAll();

if (isset($_COOKIE['username'])) {
$checkDataSet = new userDataSet();
$check = $checkDataSet->checkChecked();


$countDataSet = new productDataSet();
$count = $countDataSet->countLikes();

$likeDataSet = new productDataSet();
$view->likeDataSet = $likeDataSet->fetchLiked();


}

if (isset($_POST['submitN'])) {

    $productDataSet = new productDataSet();
    $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
    $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
}

if (isset($_SERVER['QUERY_STRING'])) {
    if ($_SERVER['QUERY_STRING'] == 'Newest') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAll();
        $indexTitle = "Newest";
        $likeTitle = "";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Oldest') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchProductByOldest();
        $indexTitle = "Oldest";
        $likeTitle = "";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Highest') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchProductByPriceHighest();
        $indexTitle = "Most Expensive";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Lowest') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchProductByPriceLowest();
        $indexTitle = "Cheapest";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    
    if ($_SERVER['QUERY_STRING'] == 'Random') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllRandom();
        $indexTitle = "Random";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'MostLikes') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByLikesHighest();
        $indexTitle = "Most Popular";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'MostDislikes') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByDislikesHighest();
        $indexTitle = "Least Popular";
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Gaming') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByGaming();
        $indexTitle = "Gaming";
        
        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Entertainment') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByEntertainment();
        $indexTitle = "Entertainment";

        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Sports') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllBySports();
        $indexTitle = "Sports";

        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Gadgets') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByGadgets();
        $indexTitle = "Gadgets";

        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
    if ($_SERVER['QUERY_STRING'] == 'Novelty') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByNovelty();
        $indexTitle = "Novelty";

        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
 
    if ($_SERVER['QUERY_STRING'] == 'Food&Drink') {
        $productDataSet = new productDataSet();
        $view->productDataSet = $productDataSet->fetchAllByFoodndrink();
        $indexTitle = "Food and Drink";

        if (isset($_POST['submitN'])) {

            $productDataSet = new productDataSet();
            $view->productDataSet = $productDataSet->fetchProductByName($_POST['pname']);
            $indexTitle = "You searched for '" . ($_POST['pname']) . "'.";
        }
        $likeTitle = "";
        $likeDataSet = new productDataSet();
        $view->likeDataSet = $likeDataSet->fetchNone();
    }
}
require_once('Views/index.phtml');
?>
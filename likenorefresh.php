<?php

require_once('Models/UserDataSet.php');
require_once ('Models/LoginDataSet.php');
require_once('Models/ProductDataSet.php');
//Add like without refreshing
$id = $_GET['id'];
$category = $_GET['category'];
$productDataSet = new productDataSet();
$productDataSet->addLike($id, $category);


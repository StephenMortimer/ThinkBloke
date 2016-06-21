<?php

require_once('Models/UserDataSet.php');
require_once ('Models/LoginDataSet.php');
require_once('Models/ProductDataSet.php');
//Toggle no refresh
$userDataSet = new userDataSet();
$personalised = $userDataSet->updatePersonalised();


<?php

//Upload image and submit new product
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ERROR);

session_start();
require_once('Models/UserDataSet.php');
require_once ('Models/LoginDataSet.php');
require_once('Models/ProductDataSet.php');


$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submitProduct"])) {
    $productDataSet = new productDataSet();
    if (!empty($_POST['pname'])) {
        $productDataSet->addProduct($_POST['pname'], $_POST['pcategory'], $_FILES['fileToUpload']["name"], $_POST['psummary'], $_POST['pprice'], $_POST['plink'], $_POST['pdesc']);
    }

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        header("refresh:2;url=index.php");
    }
}
if (isset($_POST["submitPicture"])) {
    $userDataSet = new userDataSet();
    $userDataSet->addPicture($_FILES['fileToUpload']["name"]);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        header('Location: profile.php');
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        header('Location: profile.php');
    }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo " Your file is too large.";
    $uploadOk = 0;
    header("refresh:2;url=index.php");
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header("refresh:2;url=index.php");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " Your file was not uploaded.";
    header("refresh:2;url=index.php");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo " The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        if (isset($_POST["submitPicture"])) {
            header("refresh:0;url=profile.php");
        } else {
            header("refresh:0;url=index.php");
        }
    } else {
        echo " There was an error uploading your file.";
    }
}
?>
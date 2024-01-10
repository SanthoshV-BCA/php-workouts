<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$tardir = "uploads/";
$uploadOk = 1;
$tarfile = $tardir . basename($_FILES["fileToUpload"]["name"]);
$imgfiletype = strtolower(pathinfo(["fileupload"]["tmp_name"]));
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$filepath = "filesss/";
$filename = $filepath . basename($_FILES["uploadfile"]["name"]);
$status = true;
$filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if ($filetype != "txt") {
    echo "please upload txt format only";
    $status = false;
} elseif (file_exists($filename)) {
    echo "file already exists.";
    $status = false;
} elseif ($_FILES["uploadfile"]["size"] > 2097152) {
    echo "your file is larger than 2MB";
    $status = false;
} else {
    if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filename)) {
        echo "file transfrred successfuly";
    }


}
if ($status == false) {
    echo ("<br> file not transferred");


}
// sudo chmod -R 777 destination
// sudo chmod 755 -R /var/www

// . htmlspecialchars(basename($_FILES["uploadfile"]["name"])) .
// regix task


?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$file = fopen("/opt/lampp/htdocs/sample.txt", "w") or die("unable to open file");
$text = "santhosh";
fwrite($file, $text);
fclose($file);
?>
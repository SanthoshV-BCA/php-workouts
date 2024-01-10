<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function hello($str)
{
    return $str . " hello <br>";
}
function age($str)
{
    return $str . " is your age<br>";
}
function finalee($str, $msg)
{
    echo $msg($str);
}
finalee("santhosh", "hello");
finalee("18", "age");
?>
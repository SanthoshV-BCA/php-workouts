<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class books
{
    public function bname($name)
    {
        echo ($name);
    }
    public function price()
    {
        echo ("1500");
    }
}
$obj = new books();
$obj->bname("PHP");
$obj->price();
?>
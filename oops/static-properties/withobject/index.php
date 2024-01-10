<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class sample
{
    public static $name = "santhosh";

    function namess()
    {
        return self::$name;
    }

}

$obj = new sample();
echo $obj->namess();
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class person
{
    public $name;
    private $age;
    protected $email;
}
$obj = new person();
$obj->name = "santhosh";
$obj->age = 21;
$obj->email = "santhosh@gmail.com";
?>
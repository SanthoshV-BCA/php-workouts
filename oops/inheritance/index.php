<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class animal
{
    function eat()
    {
        echo ("eating");
    }
}
/**
 * Summary of dog
 */
class dog extends animal
{

    function bark()
    {
        echo ("barking");
    }
}
class cat extends dog
{
    function sam()
    {
        echo ("hello i am cat");
    }
}
$obj = new cat();
$obj->eat();
$obj->bark();
$obj->sam();

?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
interface animal
{
    function sound();

}
class dog implements animal
{
    function sound()
    {
        echo ("dog...");
    }
}
class cat implements animal
{
    function sound()
    {
        echo ("cat....");
    }
}
class cow implements animal
{
    function sound()
    {
        echo ("cow...");
    }
}
$dog = new dog();
$cat = new cat();
$cow = new cow();
$animals = array($dog, $cat, $cow);
foreach ($animals as $animal) {
    $animal->sound();
}
?>
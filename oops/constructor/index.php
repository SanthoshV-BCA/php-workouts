<?php
class person
{
    public $name;
    public $age;




    function geting($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    function nameget()
    {
        return $this->name;
    }
    function ageget()
    {
        return $this->age;
    }
    function __construct()
    {
        echo ("i am constructor i am runing 1 st<br>");
    }
}
$obj = new person();
$obj->geting("santhosh", 21);
echo "Your name is " . $obj->nameget() . "<br>";
echo "Your age is " . $obj->ageget();



?>
<?php
class animal
{
    public $name;
    // public $color;
    function set_name($name)
    {
        $this->name = $name;
    }
}
$newvar = new animal();
$newvar->set_name("cat");
echo $newvar->name;
?>
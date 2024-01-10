<?php
class a
{
    public static function message()
    {
        echo "hello";
    }
}
class b
{
    public function message2()
    {
        a::message();
        echo "<br>this text in class b";
    }
}
$obj = new b();
$obj->message2();
?>
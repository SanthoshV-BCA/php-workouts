<?php
trait msg
{
    function message()
    {
        echo ("This is first traid message<br>");
    }
}
trait msg2
{
    function message1()
    {
        echo ("this is  second traid smessage<br>");
    }
}
trait msg3
{
    function message2()
    {
        echo "this is third traid message";
    }
}
class class1
{
    use msg;
    use msg2;
    use msg3;
}
// class class2
// {
//     use msg2;
// }
$obj = new class1();
$obj->message();
// $obj2 = new class2();
$obj->message1();
$obj->message2();

?>
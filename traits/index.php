<?php
trait msg
{
    public function msg1()
    {
        echo "hello";
    }
}
class wecome
{
    use msg;

}
$obj = new wecome();
$obj->msg1();
?>
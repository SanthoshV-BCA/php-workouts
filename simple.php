<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$b = "santhosh";
// echo("hello".$a);
// var_dump($a);
$a = [1, 2, 3];
var_dump($a);
$c = "this is sample text";
echo strlen($c);
$age = 15;
if ($age >= 18) {
    echo ("your age is above 18");
} elseif ($age >= 15 && $age <= 18) {
    echo ("your age is between 15 to 18");
} else {
    echo ("your age is below 15");
}
// =============
$mark = 20;
if ($mark == 100 || $mark <= 90) {
    echo ("A+ grade");
} elseif ($mark <= 90 || $mark >= 80) {
    echo ("b grade");
} elseif ($mark <= 80 || $mark >= 70) {
    echo ("c grade");
} elseif ($mark <= 70 || $mark >= 60) {
    echo ("d grade");
} elseif ($mark <= 60 || $mark >= 50) {
    echo ("e grade");
} else {
    echo ("fail");
}
for ($i = 0; $i <= 10; $i++) {
    echo ($i . "<br>");
}
$c = 2;
for ($j = 1; $j <= 10; $j++) {
    echo ($j . "x" . $c . "=" . $c * $j . "<br>");
}
for ($k = 1; $k <= 10; $k++) {

    for ($l = 1; $l <= 10; $l++) {
        echo ($l . "x" . $k . "=" . $l * $k . "<br>");

    }
    echo ("==========<br>");
}

$x = 0;
while ($x <= 10) {
    echo ($x);
    $x++;
}
$z = 0;
$aaa = readline("enter your name: ");
do {
    echo ("<br>" . $z);
    $z++;
} while ($z <= 20);

function myfunction()
{
    echo ("<br>hello");
}
myfunction();

?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$a = 2;
$b = 0;
for ($i = 0; $i < 4; $i++) {


    for ($j = 0; $j <= $i; $j++) {
        do {


            $b++;
        } while ($b <= 0);
        echo ($b * $a . " ");


    }

    echo ("<br>");

}




?>
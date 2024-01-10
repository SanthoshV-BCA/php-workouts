<?php
$i = 0;
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
// phpinfo();
?>
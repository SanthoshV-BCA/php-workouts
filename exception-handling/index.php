<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$b = [1, 2, 3];


try {
    echo ($b[3]);

} catch (Exception $e) {
    echo ("error");
} finally {
    echo "i am finally";
}

?>
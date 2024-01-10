<?php
$a = $_POST["name"];
$b = $_POST["password"];
if ($a == "") {
    echo ("please enter your name");
} elseif ($b == "") {
    echo ("Please enter password");
} else {
    echo ("success");
}
?>
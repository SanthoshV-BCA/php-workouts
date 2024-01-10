<?php
session_start();
$_SESSION["name"] = "santhosh";
echo ("session is " . $_SESSION["name"]);
?>
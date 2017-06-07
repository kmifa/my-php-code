<?php
session_start();

$_SESSION["name"] = "やまざき";
$_SESSION["num"] = 1000;
$_SESSION["test"] = "test";

echo $_SESSION["name"];
echo $_SESSION["num"];


?>
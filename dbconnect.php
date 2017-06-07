<?php

$hostname = "140.127.218.140";
$user = "root";
$password = "calltheshot";
$dbname = "cccamp";

$link = mysqli_connect($hostname, $user, $password, $dbname);
mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET character Set 'utf8'");

?>
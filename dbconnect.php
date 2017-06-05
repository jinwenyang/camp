<?php
$hostname = "localhost";
$user = "root";
$password = "o937o24537";
$dbname = "phphw";
$link = @mysqli_connect($hostname, $user, $password, $dbname);
mysqli_query($link, 'SET NAMES UTF-8');
mysqli_query($link,"set character set 'utf8'");

?>
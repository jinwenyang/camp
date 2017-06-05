<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php include "header.php"; ?>



<?php
 include "dbconnect.php";

if (isset($_SESSION['auth'])){
    $finda=$_SESSION['user'];
    $checka = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$finda' ; ");
    $rowFa = mysqli_fetch_assoc($checka);
        if(isset($rowFa)) 
            $u_code= $rowFa['u_code'];
            
}

$c_content=$_POST["c_content"]; 
$col_record=$_POST["col_record"];
$act_code=$_POST["act_code"];
$col_code=$_POST["col_code"];


if($_POST["c_content"]!=""){
 $sql3="INSERT INTO comment (act_code, u_code, c_content) 
 VALUES ('$act_code', '$u_code','$c_content')";


 $result=mysqli_query($link, $sql3);
}

if(isset($_POST["col_record"])){
    
$sqL2="DELETE FROM collect  WHERE col_code='$col_code'";
$result=mysqli_query($link, $sqL2);
}

mysqli_close($link);
header('Location: allcamp.php');



?>
</body>
</html>

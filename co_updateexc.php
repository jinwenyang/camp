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
    
    

<?php

$Link=mysqli_connect(
        'localhost',
        'root',
        'cccamp',
        'cccamp');

$u_id = $_POST['u_id'];
$u_pwd = $_POST['u_pwd'];
$u_name = $_POST['u_name'];
$u_phone = $_POST['u_phone'];
$u_email = $_POST['u_email'];

if (isset($_SESSION['auth'])){
        $finda=$_SESSION['user'];
        $sql="SELECT * FROM `user` WHERE `u_id` = '$finda'";
        $checka = mysqli_query($Link, $sql);
        $rowFa = mysqli_fetch_assoc($checka); 


$sql="UPDATE user 
	  SET u_id=$u_id, u_pwd=$u_pwd, u_name=$u_name, u_phone=$u_phone, u_email=$u_email 
	  WHERE user.u_code=$u_code";


$result=mysqli_query($Link, $sql);

$result=mysqli_query($Link, "SELECT * FROM user");

}

mysqli_close($Link);
header('Location: co_update.php');
?>


</body>
</html> 
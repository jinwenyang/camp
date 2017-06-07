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
    <?php include "header.php";
        include "dbconnect.php"; ?>


<?php

$Link=mysqli_connect(
        'localhost',
        'root',
        'cccamp',
        'cccamp');

mysqli_query($Link, "SET NAMES 'utf8'");
mysqli_query($Link, "set character set 'utf8'");

if (isset($_SESSION['auth'])){
        $finda=$_SESSION['user'];
        $sql="SELECT * FROM `user` WHERE `u_id` = '$finda'";
        $checka = mysqli_query($Link, $sql);
        $rowFa = mysqli_fetch_assoc($checka); 

if(isset($rowFa)) 
            $u_code= $rowFa['u_code'];
    echo "<p class='navbar-text'>".$finda."的收藏"." </p>";
        echo "<br>";

}

echo "修改會員資料"."<br>"."<br>";

$result=mysqli_query($Link, "SELECT * FROM user WHERE user.u_code=$u_code");

while($row=mysqli_fetch_assoc($result)){
echo "<form action='co_updateexc.php' method='post'>";

echo "帳號："."<input type='text' name='u_id' placeholder=$row[u_id]>"."<br>";
echo "密碼："."<input type='text' name='u_pwd' placeholder=$row[u_pwd]>"."<br>";
echo "姓名："."<input type='text' name='u_name' placeholder=$row[u_name]>"."<br>";
echo "連絡電話："."<input type='text' name='u_phone' placeholder=$row[u_phone]>"."<br>";
echo "電子信箱："."<input type='text' name='u_email' placeholder=$row[u_email]>"."<br>"."<br>";
echo "<input type='submit' name='submit' value='修改'>"."<br>";

echo "</form>";
}


mysqli_close($Link);

?>
</body>
</html>
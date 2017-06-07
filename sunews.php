
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>


    <?php

if ($_SESSION['auth'] == 'su'){
    $find=$_SESSION['user'];
    $check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
    $rowF = mysqli_fetch_assoc($check);
        if(isset($rowF)) 
            $u_code= $rowF['u_code'];
            
}




echo '<form method="post" action="sunews.php" >';
echo'<h4>刊登公告</h4><br/>';
echo'公告事項:<textarea name="n_content" rows="10" cols="50" placeholder="限500字"></textarea><br/><br/>';
echo'<input type="submit" name="subb">';
echo '</form>';



date_default_timezone_set("Asia/Taipei");

$time=date('Y年n月j日H時i分s秒 ');

$n_content=$_POST["n_content"];

echo"<h4>所有公告</h4>";
$result=mysqli_query($link,"SELECT * FROM news ;");

echo "<table border=1>";


while($row=mysqli_fetch_assoc($result)){
    echo"<tr>";
echo "<td>";
$n_code=$row["n_code"];
echo $row["n_content"]."<br>";
echo "</td><td>";
echo $row["n_time"]."<br>";
echo "</td><td>";
echo "<a href='sudelnews.php?sn_code=$n_code'>刪除資料</a>";
echo "</td>";


}
echo"<table>";


if(isset($_POST['subb'])) {

$sql2="INSERT INTO news (n_content,n_time,u_code) 
VALUES ('$n_content','$time','$u_code')";
$result=mysqli_query($link, $sql2);


mysqli_close($link);

     }  ?>
</body>
</html>
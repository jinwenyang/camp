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

$Link=mysqli_connect(
	'localhost',
	'root',
	'cccamp',
	'cccamp');

mysqli_query($Link, "SET NAMES 'utf8'");
mysqli_query($Link, "set character set 'utf8'");

if (isset($_SESSION['auth'])){
	$finda=$_SESSION['user'];
	$checka = mysqli_query($Link, "SELECT * FROM `user` WHERE `u_id` = '$finda' ; ");
    $rowFa = mysqli_fetch_assoc($checka);
        if(isset($rowFa)) 
            $u_code= $rowFa['u_code'];
    echo "<p class='navbar-text'>".$finda."的收藏"." </p>";
	echo "<br>";		
}

$sql="SELECT user.u_name, activity.act_name, activity.act_code
		, activity.act_starttime, activity.act_price, activity.act_area, collection.co_number 
	  FROM  user, activity, collection, line
	  WHERE collection.co_number=line.co_number 
	  AND collection.u_code=user.u_code 
	  AND line.act_code=activity.act_code AND user.u_code=$u_code";

$result=mysqli_query($Link, $sql);

echo "<table border=1>";
echo "<tr>";
echo "<td>";
echo "活動編號";
echo "</td><td>";
echo "舉辦時間";
echo "</td><td>";
echo "活動名稱";
echo "</td><td>";
echo "舉辦地區";
echo "</td><td>";
echo "報名費用";
echo "</td><td>";
echo "取消收藏";
echo "</td>";
echo "</tr>";

while($row=mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>";
echo $row["act_code"];
echo "</td><td>";
echo $row["act_starttime"];
echo "</td><td>";
$act_name=$row["act_name"];
echo "<a href=''>$act_name</a>";
echo "</td><td>";
echo $row["act_area"];
echo "</td><td>";
echo $row["act_price"];
echo "</td><td>";
echo "<a href='co_del.php?id=$row[co_number]'>Delete</a>";
echo "</td>";
echo "</tr>";
}

echo "</table>";
mysqli_close($Link);

?>

</body>
</html>


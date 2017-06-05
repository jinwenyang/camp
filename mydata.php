
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

if (isset($_SESSION['auth'])){
	$find=$_SESSION['user'];
	$check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
    $rowF = mysqli_fetch_assoc($check);
        if(isset($rowF)) 
            $u_code= $rowF['u_code'];
			
}


$result=mysqli_query($link,"SELECT * FROM user where u_code=$u_code;");

echo "<table border=1>";


while($row=mysqli_fetch_assoc($result)){
        echo"<tr>";
        
echo "<td>";
$u_code=$row["u_code"];
echo "密碼:".$row["u_pwd"]."<br>";
echo "姓名:".$row["u_name"]."<br>";
echo "信箱:".$row["u_email"]."<br>";
echo "電話:".$row["u_phone"]."<br>";
echo "</td><td>";
echo "<a href='updatesup.php?su_code=$u_code'>修改資料</a>";
echo "</td>";


}
echo"<table>";





mysqli_close($link);

       ?>
</body>
</html>

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





echo"<h4>所有會員</h4>";
$result=mysqli_query($link,"SELECT * FROM user ;");

echo "<table border=1>";


while($row=mysqli_fetch_assoc($result)){
echo"<tr>";
echo "<td>";
$u_code=$row["u_code"];
echo "姓名:".$row["u_name"]."<br>";
echo "帳號:".$row["u_id"]."<br>";
echo "信箱:".$row["u_email"]."<br>";
echo "電話:".$row["u_phone"]."<br>";
echo "身分:".$row["u_auth"]."<br>";
echo "</td>";


}
echo"<table>";





mysqli_close($link);

       ?>
</body>
</html>
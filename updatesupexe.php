<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更新後個人資料</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>

<?php

if ($_SESSION['auth'] == 'admin'){
	$find=$_SESSION['user'];
	$check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
    $rowF = mysqli_fetch_assoc($check);
        if(isset($rowF)) 
            $u_code= $rowF['u_code'];
			
}

			$u_code = $_POST["exeu_code"];
			$u_name = $_POST["exeu_name"];
			$u_id = $_POST["exeu_id"];
			$u_pwd = $_POST["exeu_pwd"];
			$u_phone = $_POST["exeu_phone"];
			$u_email = $_POST["exeu_email"];
			
			


			$sql2 = "UPDATE user SET u_id = '$u_id', u_name = '$u_name', u_pwd = '$u_pwd',u_phone = '$u_phone', u_email = '$u_email' WHERE u_code = '$u_code'";
			$result=mysqli_query($link, $sql2);
			$results=mysqli_query($link,"SELECT * FROM user WHERE u_code=$u_code;");
			
			echo "<table border=1>";


while($row=mysqli_fetch_assoc($results)){
        echo"<tr>";
        
echo "<td>";
echo "密碼:".$row["u_pwd"]."<br>";
echo "姓名:".$row["u_name"]."<br>";
echo "信箱:".$row["u_email"]."<br>";
echo "電話:".$row["u_phone"]."<br>";
echo "</td>";
}
echo"<table>";
		


	mysqli_close($link);
			
	?>
</body>
</html>
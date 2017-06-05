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


$act_code=$_GET["sact_code"];


$result=mysqli_query($link,"Select * From activity Where act_code=$act_code; ");
echo "<table border=1>";
while($row=mysqli_fetch_assoc($result)){    
echo"<tr>";
        echo "<td>"; echo "海報位置"; echo "</td>";
echo "<td>";
echo "<h2>營隊名稱:".$row["act_name"]."</h2><br>";
$org=$row["act_ORG"];
echo "舉辦機關:".$org."<br>";
echo "報名費:".$row["act_price"]."<br>";
echo "縣市:".$row["act_area"]."<br>";
echo "招生對象:".$row["act_stage1"].$row["act_stage2"].$row["act_stage3"].$row["act_stage4"].$row["act_stage5"].$row["act_stage6"].$row["act_stage7"].$row["act_stage8"]."<br>";
echo "營隊類型:".$row["act_field"]."<br>";
echo "報名時段:".$row["act_signup_starttime"];
echo "~".$row["act_signup_endtime"]."<br>";
echo "活動時間:".$row["act_starttime"];
echo "~".$row["act_endtime"]."<br>";
echo "負責人:".$row["act_PICname"];
echo "(".$row["act_PICphone"].")<br>";
echo "描述:".$row["act_desc"]."<br>";
$url=$row["act_url"];
echo "詳細資訊:<a href='$url'>$url</a><br>";
echo "</td>";



}
echo"<table>";



mysqli_close($link);


?>
</body>
</html>

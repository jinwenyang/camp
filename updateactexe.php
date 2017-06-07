<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改營隊</title>
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


$act_code = $_POST["exeact_code"];
			$act_name = $_POST["exeact_name"];
			$act_desc = $_POST["exeact_desc"];
			$act_price = $_POST["exeact_price"];
			$act_area = $_POST["exeact_area"];
			$act_stage1 = $_POST["exeact_stage1"];
			$act_stage2 = $_POST["exeact_stage2"];
			$act_stage3 = $_POST["exeact_stage3"];
			$act_stage4 = $_POST["exeact_stage4"];
			$act_stage5 = $_POST["exeact_stage5"];
			$act_stage6 = $_POST["exeact_stage6"];
			$act_stage7 = $_POST["exeact_stage7"];
			$act_stage8 = $_POST["exeact_stage8"];
			$act_field = $_POST["exeact_field"];
			$act_poster = $_POST['exeact_poster'];
			$act_url = $_POST["exeact_url"];
			$act_signup_starttime = $_POST["exeact_signup_starttime"];
			$act_signup_endtime = $_POST["exeact_signup_endtime"];
			$act_starttime = $_POST["exeact_starttime"];
			$act_endtime = $_POST["exeact_endtime"];
			$act_PICname = $_POST["exeact_PICname"];
			$act_PICphone = $_POST["exeact_PICphone"];
			$act_ORG = $_POST["exeact_ORG"];


			$sql2 = "UPDATE activity SET act_name = '$act_name',act_desc = '$act_desc', act_price = '$act_price', act_area = '$act_area',act_stage1 = '$act_stage1', act_stage2 = '$act_stage2', act_stage3 = '$act_stage3', act_stage4 = '$act_stage4', act_stage5 = '$act_stage5', act_stage6 = '$act_stage6', act_stage7 = '$act_stage7', act_stage8 = '$act_stage8', act_field = '$act_field', act_poster = '$act_poster', act_url = '$act_url', act_signup_starttime = '$act_signup_starttime', act_signup_endtime = '$act_signup_endtime', act_starttime = '$act_starttime', act_endtime = '$act_endtime', act_PICname = '$act_PICname', act_PICphone = '$act_PICphone', act_ORG = '$act_ORG' WHERE act_code = '$act_code'";
			$result=mysqli_query($link, $sql2);
$results=mysqli_query($link,"SELECT * FROM activity WHERE u_code=$u_code;");
			
			echo "<table border=1>";

			while($row=mysqli_fetch_assoc($results)){
        echo"<tr>";
        $act_poster=$row["act_poster"];
echo"<td><img src='$act_poster' alt='營隊海報' width=250px height=200px></td>";
       echo "<td>";
//$act_code=$row["act_code"];
echo "營隊名稱:".$row["act_name"]."<br>";
// $act_name=$row["act_name"];
// $act_code= $row['act_code'];
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
echo "詳細資訊(網址):".$url."<br>";
	}
echo"<table>";		


	mysqli_close($link);
			
	?>
</body>
</html>
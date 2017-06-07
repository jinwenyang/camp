
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





echo"<h4>所有營隊</h4>";
$result=mysqli_query($link,"SELECT * FROM activity ;");

echo "<table border=1>";


while($row=mysqli_fetch_assoc($result)){
echo"<tr>";
        
$act_poster=$row["act_poster"];
echo"<td><img src='$act_poster' alt='營隊海報' width=250px height=200px></td>";
echo "<td>";
echo "營隊名稱:".$row["act_name"]."<br>";
$act_name=$row["act_name"];
$act_code= $row['act_code'];
$org=$row["act_ORG"];
echo "舉辦機關:<a href='supIntro.php?sact_code=$act_code && sact_name=$act_name'>$org</a><br>";
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
echo "<td>";
echo "<a href='sudelcamp.php?sact_code=$act_code'>刪除資料</a>";
echo "</td>";


}
echo"<table>";





mysqli_close($link);
//header('Location: index.php');
       ?>
</body>
</html>
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
$result=mysqli_query($link,"SELECT act_code,COUNT(col_code) as camp FROM `collect` GROUP BY act_code ORDER BY COUNT(col_code) DESC LIMIT 1;");
while($row=mysqli_fetch_assoc($result)){
$act_code=$row["act_code"];
$camp= $row['camp'];
        $resulttype=mysqli_query($link,"SELECT * from activity where act_code=$act_code;");
        while($row=mysqli_fetch_assoc($resulttype)){
        $act_code=$row["act_code"];
        $act_name=$row["act_name"];
        $act_ORG=$row["act_ORG"];
}
echo"<h4>最受歡迎的營隊:<a href='campIntro.php?sact_code=$act_code '>$act_name</a></h4><br>";
echo"被收藏次數:".$camp."<br><br>";

}
$resultc=mysqli_query($link,"SELECT act_code,COUNT(c_code) as com FROM `comment` GROUP BY act_code ORDER BY COUNT(c_code) DESC LIMIT 1;");
while($rowc=mysqli_fetch_assoc($resultc)){
$act_code=$rowc["act_code"];
$com= $rowc['com'];
        $resultcom=mysqli_query($link,"SELECT * from activity where act_code=$act_code;");
        while($row=mysqli_fetch_assoc($resultcom)){
        $act_code=$row["act_code"];
        $act_name=$row["act_name"];
}
echo"<h4>最受關注的營隊:<a href='campIntro.php?sact_code=$act_code '>$act_name</a></h4><br>";
echo"留言數:".$com."<br><br>";
}
$resultt=mysqli_query($link,"SELECT act_field,COUNT(collect.col_code) as type FROM activity,collect WHERE collect.act_code=activity.act_code GROUP BY act_field ORDER BY type DESC LIMIT 1;");
while($row=mysqli_fetch_assoc($resultt)){
$act_field=$row["act_field"];
$type= $row['type'];
echo"<h4>最受歡迎的營隊類型:".$act_field."</h4>";
echo"被收藏次數:".$type."<br>";
}
mysqli_close($link);
?>
</body>
</html>
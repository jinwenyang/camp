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

$c_content=$_POST["c_content"]; 
$col_record=$_POST["col_record"];
$act_code=$_POST["act_code"];
$col_code=$_POST["col_code"];

//echo "輸入".$c_content,$col_record,$act_code,$col_code;

// $sql3="INSERT INTO comment (act_code, u_code, c_content) 
// VALUES ('$act_code', '$u_code','$c_content')";

// $sqL2="SELECT * FROM  collect  WHERE col_code='$col_code'";
// $result=mysqli_query($link, $sqL2);

// while($row=mysqli_fetch_assoc($result)){
//     $col_code=$row["col_code"];
//     $col_record=$row["col_record"];
//     $act_code=$row["act_code"];
// }
//echo "擁有".$col_record,$act_code,$col_code;
echo "<h2>提醒!<h2>";
echo"<form action='insertexe.php' method='post'>";
echo"<input type='hidden' value='$c_content' name='exec_content'><br>";
echo"<input type='hidden' value='$col_code' name='execol_code'><br>";
echo"<input type='hidden' value='$act_code' name='exeact_code'><br>";
echo"<input type='hidden' value='$col_record' name='execol_record'><br>";
echo"<input type='submit' value='修改收藏(您已收藏，按下按鈕將取消收藏!!)'>";
echo"</form>";






//$result=mysqli_query($link, $sql3);




// $act_code=$_SESSION['act_code'];

// $ucol_code=$_POST["ncol_code"];
// $ucol_record=$_POST["ncol_record"];


// $sqL2="UPDATE collect SET col_record='$ucol_record' WHERE col_code='$ucol_code'";
// $result=mysqli_query($Link, $sqL2);
mysqli_close($link);

//header("Refresh:1; url=allcamp.php");
//header('Location: allcamp.php');



?>
</body>
</html>

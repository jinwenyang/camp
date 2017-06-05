<?php session_start(); ?>
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
$act_name=$_GET['sact_name'];
echo "<h4>營隊:".$act_name."<h4>";
$result=mysqli_query($link,"SELECT * FROM comment WHERE act_code = $act_code ; ");

echo'<h4>評價</h4><br/>';
echo "<table border=1>";

while($row=mysqli_fetch_assoc($result)){    
echo"<tr>";
echo "<td>";
echo "內容:".$row["c_content"]."<br>";
echo "</td>";
    }
echo"<table>";

$findc = mysqli_query($link, "SELECT * FROM `collect` WHERE u_code = $u_code AND act_code= $act_code; ");



    while($rowc = mysqli_fetch_assoc($findc)){
    $col_code= $rowc['col_code'];

   
}


// $results=mysqli_query($link,"SELECT COUNT(col_code) AS ii FROM collect WHERE col_record ='收藏' GROUP BY act_code = $act_code AND u_code= $u_code; ");

// while($rows=mysqli_fetch_assoc($results)){
//     $ii=$rows["ii"];
   
// }

if($ii%2==0){
echo '<form method="post" action="supIntro.php" >';
echo'<h4>給評價</h4><br/>';
echo'請輸入評價:<textarea name="c_content" rows="6" cols="50" placeholder="限300字"></textarea><br/><br/>';

echo'<input type="checkbox" name="col_record" vaLue="收藏">收藏<br/><br/>';
echo'<input type="hidden" name="act_code" value="'.$act_code.'" />';
echo'<input type="submit" name="subb">';

echo '</form>';

$c_content=$_POST["c_content"];
$col_record=$_POST["col_record"];
$act_code=$_POST["act_code"];

if(isset($_POST['subb'])) {

$sql3="INSERT INTO comment (act_code, u_code, c_content) 
VALUES ('$act_code', '$u_code','$c_content')";

$sql4="INSERT INTO collect (act_code, u_code, col_record) 
VALUES ('$act_code', '$u_code','$col_record')";




$result=mysqli_query($link, $sql3);
$result=mysqli_query($link, $sql4);





mysqli_close($link);
header("Refresh:1; url=allcamp.php");
   }

}else{

echo '<form method="post" action="supIntroexe.php" >';
echo'<h4>給評價</h4><br/>';
echo'請輸入評價:<textarea name="c_content" rows="6" cols="50" placeholder="限300字"></textarea><br/><br/>';
echo'<input type="checkbox" name="col_record" vaLue="不收藏">收藏(您已收藏，按下按鈕將取消收藏!!)<br/><br/>';
echo'<input type="hidden" name="act_code" value="'.$act_code.'" />';
echo'<input type="hidden" name="col_code" value="'.$col_code.'" />';
echo'<input type="submit" name="subb">';
echo '</form>';





// $c_content=$_POST["c_content"]; 
// $col_record=$_POST["col_record"];
// $act_code=$_POST["act_code"];

// if(isset($_POST['subb'])) {

// $sql3="INSERT INTO comment (act_code, u_code, c_content) 
// VALUES ('$act_code', '$u_code','$c_content')";


// $sql4="UPDATE collect SET col_record='$col_record' WHERE 
// col_code='$col_code'";

// $result=mysqli_query($link, $sql3);
// $result=mysqli_query($link, $sql4);





mysqli_close($link);
}
//header("Refresh:1; url=allcamp.php");
//header('Location: allcamp.php');



?>
</body>
</html>

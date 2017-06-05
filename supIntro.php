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
            $usu_code= $rowFa['u_code'];
			
}

if(isset($_POST['subb'])) {

    $c_content=$_POST["c_content"];
    $col_record=$_POST["col_record"];
    $act_code=$_POST["act_code"];

if($_POST["c_content"]!=""){
    $sql3="INSERT INTO comment (act_code, u_code, c_content) 
    VALUES ('$act_code', '$usu_code','$c_content')";

    $result=mysqli_query($link, $sql3);
        }
    if(isset($_POST["col_record"])){

    $sql4="INSERT INTO collect (act_code, u_code, col_record) 
    VALUES ('$act_code', '$usu_code','$col_record')";


    $result=mysqli_query($link, $sql4);
    }
    mysqli_close($link);

    if(isset($_POST['subb'])){
    unset($_POST['subb']);
    }
    header('Location: allcamp.php');

}else{

    $act_code=$_GET["sact_code"];
    $act_name=$_GET['sact_name'];

    $result=mysqli_query($link,"Select * From activity Where act_code=$act_code; ");
    while($row=mysqli_fetch_assoc($result)){    
    $u_code=$row["u_code"];
    $act_ORG=$row["act_ORG"];
        }

    echo "<h4>營隊名稱:".$act_name."<h4>";


    echo'<h4>對'.$act_ORG.'的評價:</h4><br/>';

    $result=mysqli_query($link,"Select comment.c_content,act_name From comment,activity Where comment.act_code = activity.act_code And activity.u_code = $u_code; ");

    echo "<table border=1>";
    echo"<tr><td>營隊</td>";
    echo"<td>評價</td>";
    echo "</tr>";

    while($row=mysqli_fetch_assoc($result)){    
   
    echo "<tr><td>";
    echo $row["act_name"]."</td><td>";
    echo $row["c_content"]."<br>";
    echo "</td>";
            }
    echo"<table>";

    if(isset($_SESSION['auth'])){


    $findc = mysqli_query($link, "SELECT * FROM `collect` WHERE u_code = $usu_code AND act_code= $act_code; ");


    while($rowc = mysqli_fetch_assoc($findc)){
    $col_code= $rowc['col_code'];
    $col_record= $rowc['col_record'];
        }




        if(!isset($col_code)){
        echo '<form method="post" action="supIntro.php" >';
        echo'<h4>給評價</h4><br/>';
        echo'請輸入評價:<textarea name="c_content" rows="6" cols="50" placeholder="限300字"></textarea><br/><br/>';

        echo'<input type="checkbox" name="col_record" vaLue="收藏">收藏營隊<br/><br/>';
        echo'<input type="hidden" name="act_code" value="'.$act_code.'" />';
        echo'<input type="submit" name="subb">';

        echo '</form>';

        mysqli_close($link);


    }else if($col_record="收藏"){

        echo '<form method="post" action="supIntroexe.php" >';
        echo'<h4>給評價</h4><br/>';
        echo'請輸入評價:<textarea name="c_content" rows="6" cols="50" placeholder="限300字"></textarea><br/><br/>';
        echo'<input type="checkbox" name="col_record" vaLue="不收藏">收藏營隊(您已收藏，按下按鈕將取消收藏!!)<br/><br/>';
        echo'<input type="hidden" name="act_code" value="'.$act_code.'" />';
        echo'<input type="hidden" name="col_code" value="'.$col_code.'" />';
        echo'<input type="submit" name="subb">';
        echo '</form>';


        mysqli_close($link);

                }


    }else{

    mysqli_close($link);

    }
}
?>
</body>
</html>

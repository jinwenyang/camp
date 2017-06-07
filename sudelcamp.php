<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>刪除營隊</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>

<?php

 $act_code=$_GET["sact_code"];

$sqL2="DELETE FROM activity  WHERE act_code='$act_code'";
$result=mysqli_query($link, $sqL2);


mysqli_close($link);
header('Location: sucamp.php');
	?>
</body>
</html>
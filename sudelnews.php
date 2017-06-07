<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>刪除公告</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>

<?php

 $n_code=$_GET["sn_code"];

$sqL2="DELETE FROM news  WHERE n_code='$n_code'";
$result=mysqli_query($link, $sqL2);


mysqli_close($link);
header('Location: sunews.php');
	?>
</body>
</html>
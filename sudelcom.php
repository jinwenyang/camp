<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>刪除評價</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>

<?php

 $c_code=$_GET["sc_code"];

$sqL2="DELETE FROM comment  WHERE c_code='$c_code'";
$result=mysqli_query($link, $sqL2);


mysqli_close($link);
header('Location: sucom.php');
	?>
</body>
</html>
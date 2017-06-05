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

 $result=mysqli_query($link,"SELECT * FROM news ORDER BY n_code DESC");

echo "<table border=1>";

echo"<tr>";
echo "<td>";
echo "內容";
echo "</td>";
echo "<td>";
echo "時間";
echo "</td>";
 echo"</tr>";

while($row=mysqli_fetch_assoc($result)){
echo"<tr>";
echo "<td>";
echo $row["n_content"]."<br>";
echo "</td><td>";
echo $row["n_time"]."<br>";
echo "</td></tr>";



}
echo"<table>";



mysqli_close($link);


?>
</body>
</html>

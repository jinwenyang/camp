
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





echo"<h4>所有評價</h4>";
$result=mysqli_query($link,"SELECT * FROM comment ;");

echo "<table border=1>";


while($row=mysqli_fetch_assoc($result)){
echo"<tr>";
echo "<td>";
$c_code=$row["c_code"];
echo $row["c_content"]."<br>";
echo "</td>";
echo "<td>";
echo "<a href='sudelcom.php?sc_code=$c_code'>刪除資料</a>";
echo "</td>";


}
echo"<table>";





mysqli_close($link);

       ?>
</body>
</html>
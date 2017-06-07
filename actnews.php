
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container text-center">


        <?php

        include "header.php";
        include "dbconnect.php";


        if ($_SESSION['auth'] == 'admin'){
            $find=$_SESSION['user'];
            $check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
            $rowF = mysqli_fetch_assoc($check);

            if(isset($rowF)) 
            $u_code= $rowF['u_code'];
        }


        echo '<form method="post" action="actnews.php" >';
        echo'<h4>刊登公告</h4><br/>';
        echo'公告事項:<textarea name="n_content" rows="10" cols="50" placeholder="限500字"></textarea><br/><br/>';
        echo'<input type="submit" name="subb">';
        echo '</form>';


        date_default_timezone_set("Asia/Taipei");

        $time=date('Y年n月j日H時i分s秒 ');

        $n_content=$_POST["n_content"];

        echo"<h4>我刊登的公告</h4>";
        $result=mysqli_query($link,"SELECT * FROM news where u_code=$u_code;");

        echo "<table border=1>";


        while($row=mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td>";
        $n_code=$row["n_code"];
        echo $row["n_content"]."<br>";
        echo "</td><td>";
        echo $row["n_time"]."<br>";
        echo "</td><td>";
        echo "<a href='delnews.php?sn_code=$n_code'>刪除資料</a>";
        echo "</td>";


        }
        echo"<table>";


        if(isset($_POST['subb'])) {

        $sql2="INSERT INTO news (n_content,n_time,u_code) 
        VALUES ('$n_content','$time','$u_code')";
        $result=mysqli_query($link, $sql2);


           }
        mysqli_close($link);
        
          ?>

    </div>
</body>
</html>
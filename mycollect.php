
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的收藏</title>
</head>
<body>
        <?php
        include "header.php";
        include "dbconnect.php";



        if ($_SESSION['auth'] == 'user'){
            $find=$_SESSION['user'];
            $check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
            $rowF = mysqli_fetch_assoc($check);
                if(isset($rowF)) 
                    $u_code= $rowF['u_code'];                    
        }


        $result=mysqli_query($link,"select * from activity WHERE act_code IN (SELECT act_code FROM collect WHERE u_code=$u_code );");

        while($row=mysqli_fetch_assoc($result)){
            $act_name=$row["act_name"]; 
            $act_code= $row['act_code'];  

            echo "<table border=1>";
            echo"<tr>";        
            echo "<td>";
            echo "收藏活動:<a href='campIntro.php?sact_code=$act_code '>$act_name</a><br>";
            echo "</td>";
        }
        echo"<table>";

        mysqli_close($link);

        ?>
</body>
</html>
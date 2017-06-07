
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的營隊</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">

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


        $result=mysqli_query($link,"SELECT * FROM activity where u_code=$u_code;");

        echo "<table border=1>";


        while($row=mysqli_fetch_assoc($result)){
            echo"<tr>";
            $act_poster=$row["act_poster"];
            echo"<td><img src='$act_poster' alt='營隊海報' width=250px height=200px></td>";
            echo "<td>";
            $act_code=$row["act_code"];
            echo "營隊名稱:".$row["act_name"]."<br>";
            $act_name=$row["act_name"];
            $act_code= $row['act_code'];
            $org=$row["act_ORG"];
            echo "舉辦機關:".$org."<br>";
            echo "報名費:".$row["act_price"]."<br>";
            echo "縣市:".$row["act_area"]."<br>";
            echo "招生對象:".$row["act_stage1"].$row["act_stage2"].$row["act_stage3"].$row["act_stage4"].$row["act_stage5"].$row["act_stage6"].$row["act_stage7"].$row["act_stage8"]."<br>";
            echo "營隊類型:".$row["act_field"]."<br>";
            echo "報名時段:".$row["act_signup_starttime"];
            echo "~".$row["act_signup_endtime"]."<br>";
            echo "活動時間:".$row["act_starttime"];
            echo "~".$row["act_endtime"]."<br>";
            echo "負責人:".$row["act_PICname"];
            echo "(".$row["act_PICphone"].")<br>";
            echo "描述:".$row["act_desc"]."<br>";
            $url=$row["act_url"];
            echo "詳細資訊(網址):".$url."<br>";
            echo "</td><td>";
            echo "<a href='delact.php?sact_code=$act_code'>刪除資料</a>";
            echo "</td><td>";
            echo "<a href='updateact.php?sact_code=$act_code'>修改資料</a>";
            echo "</td>";
        }
        echo"<table>";


        mysqli_close($link);
        ?>

    </div>


</body>
</html>
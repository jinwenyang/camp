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
    <?php 
    include "header.php";

        $Link=mysqli_connect(
        'localhost', 
        'root', 
        'cccamp', 
        'cccamp');

        mysqli_query($Link, "SET NAMES 'utf8'");
        mysqli_query($Link, "set character set 'utf8'");

        if($Link)
        {
        echo "Connected!"."<br>";
        }else{
        echo "Connection failed"."<br>";
        }

        if (isset($_SESSION['auth'])){
        $finda=$_SESSION['user'];

        $checka = mysqli_query($Link, "SELECT * FROM `user` WHERE `u_id` = '$finda' ");
        $rowFa = mysqli_fetch_assoc($checka);
        if(isset($rowFa)) 
        $u_code = $rowFa['u_code'];

        $heke=mysqli_query($Link, "SELECT * FROM `collection`");
        $rowMi = mysqli_fetch_assoc($heke);
        if(isset($rowMi))     
        $co_number=$rowMi['co_number'];

        echo "<p class='navbar-text'>".$finda."的收藏"." </p>";
        echo "<br>";		
        }

        $sql2="DELETE FROM collection WHERE co_number='$co_number'";


        $result=mysqli_query($Link, $sql2);

        mysqli_close($Link);
        header('Location: collection.php');

        ?>
    </body>
</html>
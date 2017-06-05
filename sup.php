<?php
if(!isset($_SESSION['user'])){
    echo "您尚未登入<br />";
    
    echo "<a href='login.php'>點此登入</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php include "header.php"; ?>

    <?php
    if($_SESSION['auth'] == 'admin') {
            echo "<ul>
                <li><a href=''>修改個人資料</a></li><li>|</li>
                <li><a href=''>刊登營隊</a></li><li>|</li>
                <li><a href=''>編輯營隊</a></li><li>|</li>
                </ul>";
        }
        ?>
</body>
</html>
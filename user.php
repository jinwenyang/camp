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
    if($_SESSION['auth'] == 'user') {
            echo "<ul>
                <li><a href=''>會員資料修改</a></li><li>|</li>
                <li><a href=''>營隊收藏</a></li><li>|</li>
                <li><a href=''>我的營隊收藏</a></li>
                </ul>";
                }?>
</body>
</html>
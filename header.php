<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="quickbar">

        <div class="quicklogin">
        <?php
        if(isset($_SESSION['user'])) {
            echo "<b>".$_SESSION['user']."</b> 你好，點此<a href='logout.php'>登出</a>";
        }else {
            echo "歡迎來到CCCamp，請<a href='login.php'>登入</a>，或是<a href='regist.php'>註冊會員</a></span>";
        }
        ?>
        </div>

        <div class="searchbar">
            <form action="search.php" method="get">
                <input type="text" name="srch" placeholder="搜尋營隊">
                <input type="submit" value="立即搜尋">
            </form>
        </div>

        <div class="quicknav">
        <?php
        if(!isset($_SESSION['auth'])) {
            echo "<ul>
                <li><a href='allcamp.php'>營隊一覽</a></li><li>|</li>
                <li><a href='user.php'>會員專區</a></li><li>|</li>
                <li><a href='news.php'>最新消息</a></li><li>|</li>
                <li><a href='sup.php'>廠商專區</a></li>
                </ul>";
        }elseif ($_SESSION['auth'] == 'user') {
            echo "<ul>
                <li><a href='mydata.php'>我的資料</a></li><li>|</li>
                <li><a href='allcamp.php'>營隊一覽</a></li><li>|</li>
                <li><a href='hot.php'>熱門排行榜</a></li><li>|</li>
                <li><a href='mycollect.php'>我的營隊收藏</a></li>
                </ul>";
        }elseif ($_SESSION['auth'] == 'admin') {
            echo "<ul>
                <li><a href='mydata.php'>我的資料</a></li><li>|</li>
                <li><a href='newcamp.php'>刊登營隊</a></li><li>|</li>
                <li><a href='mycamp.php'>我的營隊總覽與修改</a></li><li>|</li>
                <li><a href='actnews.php'>管理活動最新消息</a></li>
                </ul>";
        }
        ?>
        </div>

    </div>
    
</body>
</html>
<?php
if(isset($_SESSION['user'])){
    echo "您已登入為:<br />";
    foreach ($_SESSION as $key => $value)
        echo $key." : ".$value."<br />";
    echo "<a href='logout.php'>點此登出</a>";
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
    if(isset($_POST['submit'])) {
        $id = $_POST['userid']; 
        $pwd = $_POST['userpwd'];
        include "dbconnect.php";
        $login = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$id' AND `u_pwd` = '$pwd'; ");
        $row = mysqli_fetch_assoc($login);
        if(isset($row)) {
            $_SESSION['user'] = $row['u_id'];
			$_SESSION['auth'] = $row['u_auth'];
            echo "成功登入為".$_SESSION['user'];
            header("Refresh:1; url=index.php");
        }else {
            $_POST = array();
            echo "帳號或密碼錯誤，<a href='login.php'>在試一次</a>";
        }
    }else {
    ?>
    <form action="login.php" method="post">
        <h4>會員登入</h4>
        <lable>帳號</lable><input type="text" name="userid" placeholder="請輸入帳號" required><br>
        <lable>密碼</lable><input type="password" name="userpwd" placeholder="請輸入密碼" required><br>
        
        <input type="submit" name="submit" value="登入"><br>
    </form>
    <span>還不是會員嗎？立即<a href="./regist.php">註冊</a></span><br>
    <span><a href="">忘記密碼</a><a href="">忘記帳號</a></span>
    <?php } ?>
</body>
</html>
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
        $userid = $_POST['userid'];
        $userpwd = $_POST['userpwd'];
        $username = $_POST['username'];
        $usertel = $_POST['usertel'];
        $usermail = $_POST['usermail'];
        $userauth = $_POST['userauth'];

        include "dbconnect.php";
        $getUserId = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$userid'");
        $id = mysqli_fetch_assoc($getUserId);
        if($id){
            echo "帳號<em>". $userid ."</em>已被使用，請選擇其他帳號";
        }else{
            $query = mysqli_query($link, "INSERT INTO `user` (`u_id`, `u_pwd` , `u_name`,`u_phone`,`u_email`, `u_auth`) VALUES ('$userid','$userpwd','$username','$usertel','$usermail','$userauth'); ");
            if(isset($query)){
                echo "用戶：<b>".$userid."</b>註冊成功，請牢記您的密碼<br />";
                echo "2秒後將跳轉至首頁，或<a href='./login.php'>立即登入</a>";
                header("Refresh:2; url=index.php");
            }else{
                echo "There is an Error while Saving: ";
                echo "<br />Please click on Create User from menu, and try again<br /><br />";
            }
        }
        exit;
    }else {
    ?>
    <form action="regist.php" method="post">
        <h4>會員註冊</h4>
        <lable>帳號</lable><input type="text" name="userid" placeholder="請輸入帳號" required><br>
        <lable>姓名</lable><input type="text" name="username" placeholder="請輸入姓名" required><br>
        <lable>密碼</lable><input type="password" name="userpwd" placeholder="請輸入密碼" required><br>
        <lable>電話</lable><input type="tel" name="usertel" placeholder="請輸入密碼" required><br>
        <lable>信箱</lable><input type="email" name="usermail" placeholder="請輸入密碼" required><br>
        <lable>身分</lable><input type="radio" name="userauth" vaLue="user" >一般會員 <input type="radio" name="userauth" vaLue="admin">廠商<br>
        <input type="submit" name="submit" value="立即註冊"><br>
    </form>
    <span>已經是會員了嗎？立即<a href="./login.php">登入</a></span><br>
    <?php } ?>
</body>
</html>





        
        


        
    
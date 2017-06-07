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
        <div class="row text-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="regist.php" method="post">
                    <h4 class="page-header">會員註冊</h4>
                    <div class="input-group">
                        <span class="input-group-addon">帳號</span>
                        <input type="text" class="form-control" name="userid" placeholder="請輸入帳號" required autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">密碼</span>
                        <input type="password" class="form-control" name="userpwd" placeholder="請輸入密碼" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">姓名</span>
                        <input type="text" class="form-control" name="username" placeholder="請輸入真實姓名" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">電話</span>
                        <input type="number" class="form-control" name="usertel" placeholder="請輸入電話" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">信箱</span>
                        <input type="mail" class="form-control" name="usermail" placeholder="請輸入電子信箱地址" required>
                    </div>
                    <div class="input-group">
                        <input type="radio" class="radio-inline align-center" name="userauth" vaLue="user" >一般會員 
                        <input type="radio" class="radio-inline " name="userauth" vaLue="admin">廠商<br>
                    </div>

                    


                    <input type="submit" class="btn btn-success" name="submit" value="立即註冊"><br>

                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <?php } ?>

        <?php include 'footer.php'; ?>

    </div>
</body>
</html>





        
        


        
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改個人資料</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <?php 

        include "header.php";
        include "dbconnect.php";

        $u_code=$_GET["su_code"];

        $sqL2="SELECT * FROM  user  WHERE u_code='$u_code'";
        $result=mysqli_query($link, $sqL2);

        while($row = mysqli_fetch_assoc($result)){
            $u_id=$row["u_id"];	
            $u_name=$row["u_name"];
            $u_code= $row['u_code'];
            $u_email=$row["u_email"];
            $u_phone=$row["u_phone"];
            $u_pwd=$row["u_pwd"];
        }

        echo"<form method='POST' action='updatesupexe.php'>";

        echo"<input type='hidden' value='$u_code' name='exeu_code'><br>";
        echo"<input type='hidden' value='$u_id' name='exeu_id'><br>";
        echo"姓名<input type='text' value='$u_name' name='exeu_name' ><br>";
        echo"密碼<input type='password' value='$u_pwd' name='exeu_pwd' ><br>";
        echo"電話<input type='tel' value='$u_phone' name='exeu_phone' ><br>";
        echo"信箱<input type='email' value='$u_email' name='exeu_email' ><br>";			
        echo"<input type='submit' value='修改資料'>";
        echo"</form>";				

        mysqli_close($link);
        ?>

    </div>
</body>
</html>
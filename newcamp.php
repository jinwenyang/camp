
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>刊登營隊 - CCcamp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">

        <?php 
        include 'header.php';

        if(!isset($_SESSION['user'])) {

            header ('Location: loginalert.php'); 

        }else if ($_SESSION['auth'] == 'user') {
            
            header ('Location: authalert.php');  

        }else {
            
            if(isset($_POST['submit'])) {

                include "dbconnect.php";

                $act_name=$_POST["act_name"];
                $act_desc=$_POST["act_desc"];
                $act_price=$_POST["act_price"];
                $act_area=$_POST["act_area"];
                $act_stage1=$_POST["act_stage1"];
                $act_stage2=$_POST["act_stage2"];
                $act_stage3=$_POST["act_stage3"];
                $act_stage4=$_POST["act_stage4"];
                $act_stage5=$_POST["act_stage5"];
                $act_stage6=$_POST["act_stage6"];
                $act_stage7=$_POST["act_stage7"];
                $act_stage8=$_POST["act_stage8"];
                $act_field=$_POST["act_field"];
                $act_poster=$_POST["act_poster"];
                $act_url=$_POST["act_url"];
                $act_signup_starttime=$_POST["act_signup_starttime"];
                $act_signup_endtime=$_POST["act_signup_endtime"];
                $act_starttime=$_POST["act_starttime"];
                $act_endtime=$_POST["act_endtime"];
                $act_PICname=$_POST["act_PICname"];
                $act_PICphone=$_POST["act_PICphone"];
                $act_ORG=$_POST["act_ORG"];


                $find=$_SESSION['user'];
                $check = mysqli_query($link, "SELECT * FROM `user` WHERE `u_id` = '$find' ; ");
                $rowF = mysqli_fetch_assoc($check);

                if(isset($rowF)) 
                    $u_code= $rowF['u_code'];

                $sql2="INSERT INTO activity (act_name, act_desc, act_price, act_area, act_stage1,act_stage2,act_stage3,act_stage4,act_stage5,act_stage6,act_stage7,act_stage8,act_field,act_poster,act_url,act_signup_starttime,act_signup_endtime,act_starttime,act_endtime,act_PICname,act_PICphone,act_ORG,u_code) 
                VALUES ('$act_name', '$act_desc','$act_price', '$act_area', '$act_stage1','$act_stage2','$act_stage3','$act_stage4','$act_stage5','$act_stage6','$act_stage7','$act_stage8','$act_field','$act_poster','$act_url','$act_signup_starttime','$act_signup_endtime','$act_starttime','$act_endtime','$act_PICname','$act_PICphone','$act_ORG','$u_code')";
                $result=mysqli_query($link, $sql2);


                mysqli_close($link);

            }else {
                echo '<form method="post" action="newcamp.php" enctype="multipart/form-data">';
                echo '<h4>刊登營隊</h4><br/>';
                echo '活動名稱:<input type="text" name="act_name"><br/><br/>';
                echo '活動敘述:<textarea name="act_desc" rows="6" cols="50" placeholder="限300字"></textarea><br/><br/>';
                echo '報名費:<input type="text" name="act_price"><br/><br/>';
                echo '地點:<select name="act_area">
                <option vaLue="1">臺北市</option>
                <option vaLue="2">新北市</option>
                <option vaLue="3">桃園市</option>
                <option vaLue="4">臺中市</option>
                <option vaLue="5">臺南市</option>
                <option vaLue="6">高雄市</option>
                <option vaLue="7">基隆市</option>
                <option vaLue="8">桃園縣</option>
                <option vaLue="9">新竹市</option>
                <option vaLue="10">新竹縣</option>
                <option vaLue="11">苗栗縣</option>
                <option vaLue="12">彰化市</option>
                <option vaLue="13">彰化縣</option>
                <option vaLue="14">南投縣</option>
                <option vaLue="15">雲林縣</option>
                <option vaLue="16">嘉義市</option>
                <option vaLue="17">嘉義縣</option>
                <option vaLue="18">屏東市</option>
                <option vaLue="19">屏東縣</option>
                <option vaLue="20">台東縣</option>
                <option vaLue="21">花蓮市</option>
                <option vaLue="22">花蓮縣</option>
                <option vaLue="23">宜蘭縣</option>
                <option vaLue="24">澎湖縣</option>
                <option vaLue="25">金門縣</option>
                <option vaLue="26">連江縣</option>
                <option vaLue="27">香港</option>
                <option vaLue="28">海外</option>
                <option vaLue="29">其他</option>
                </select> <br/><br/>';
                echo '開放學齡: 
                <input type="checkbox" name="act_stage1" vaLue="幼稚園 " >幼稚園
                <input type="checkbox" name="act_stage2" vaLue="國小 ">國小
                <input type="checkbox" name="act_stage3" vaLue="國中 ">國中
                <input type="checkbox" name="act_stage4" vaLue="高中 ">高中
                <input type="checkbox" name="act_stage5" vaLue="高職 ">高職
                <input type="checkbox" name="act_stage6" vaLue="大專院校 ">大專院校
                <input type="checkbox" name="act_stage7" vaLue="研究所 ">研究所
                <input type="checkbox" name="act_stage8" vaLue="社會人士 ">社會人士
                <br/><br/>';

                echo '營隊類型: 
                <input type="radio" name="act_field" vaLue="1">法政
                <input type="radio" name="act_field" vaLue="2">財經
                <input type="radio" name="act_field" vaLue="3">外語
                <input type="radio" name="act_field" vaLue="4">數理化學
                <input type="radio" name="act_field" vaLue="5">地球與環境
                <input type="radio" name="act_field" vaLue="6">資訊
                <input type="radio" name="act_field" vaLue="7">生物資源
                <input type="radio" name="act_field" vaLue="8">建築
                <input type="radio" name="act_field" vaLue="9">設計
                <input type="radio" name="act_field" vaLue="10">藝術
                <input type="radio" name="act_field" vaLue="11">社會與心理
                <input type="radio" name="act_field" vaLue="12">大眾傳播
                <input type="radio" name="act_field" vaLue="13">文史哲
                <input type="radio" name="act_field" vaLue="14">教育
                <input type="radio" name="act_field" vaLue="15">管理
                <input type="radio" name="act_field" vaLue="16">運動遊憩
                <input type="radio" name="act_field" vaLue="17">工程
                <input type="radio" name="act_field" vaLue="18">機器人
                <input type="radio" name="act_field" vaLue="19">生命科學
                <input type="radio" name="act_field" vaLue="20">醫藥衛生
                <input type="radio" name="act_field" vaLue="21">其他
                <br/><br/>';
                echo '上傳海報(網址): <input type="text" name="act_poster" placeholder="請存入圖片網址!!"><br/><br/>';
                echo '營隊網站網址: <input type="text" name="act_url" ><br/><br/>';
                echo '報名時間: <input type="date" name="act_signup_starttime">';
                echo '~ <input type="date" name="act_signup_endtime"><br/><br/>';
                echo '營期: <input type="date" name="act_starttime">';
                echo '~ <input type="date" name="act_endtime"><br/><br/>';
                echo '聯絡人: <input type="text" name="act_PICname"><br/><br/>';
                echo '聯絡人電話: <input type="text" name="act_PICphone"><br/><br/>';
                echo '舉辦機關: <input type="text" name="act_ORG"><br/><br/>';

                echo '<input type="submit" name="submit">';
                echo '</form>';


            }
        }


        ?>
    </div>
</html>
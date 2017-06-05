
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改營隊</title>
</head>
<body>
        <?php include "header.php";
        include "dbconnect.php"; ?>
 <?php
 $act_code=$_GET["sact_code"];

 $sqL2="SELECT * FROM  activity  WHERE act_code='$act_code'";
$result=mysqli_query($link, $sqL2);

while($row=mysqli_fetch_assoc($result)){
	
        


$act_name=$row["act_name"];
$act_code= $row['act_code'];
$org=$row["act_ORG"];
$act_price=$row["act_price"];
$act_area=$row["act_area"];
$act_stage1=$row["act_stage1"];
$act_stage2=$row["act_stage2"];
$act_stage3=$row["act_stage3"];
$act_stage4=$row["act_stage4"];
$act_stage5=$row["act_stage5"];
$act_stage6=$row["act_stage6"];
$act_stage7=$row["act_stage7"];
$act_stage8=$row["act_stage8"];
$act_field=$row["act_field"];
$act_signup_starttime=$row["act_signup_starttime"];
$act_signup_endtime=$row["act_signup_endtime"];
$act_starttime=$row["act_starttime"];
$act_endtime=$row["act_endtime"];
$act_PICname=$row["act_PICname"];
$act_PICphone=$row["act_PICphone"];
$act_desc=$row["act_desc"];
$url=$row["act_url"];


}
	
			echo"<form method='POST' action='updateactexe.php'>";
				echo"<h4>名稱:".$act_name."<h4><br><br>";

				echo"<input type='hidden' value='$act_code' name='exeact_code'><br>";
				echo"活動名稱:<input type='text' value='$act_name' name='exeact_name'><br>";
				echo"活動敘述(限300字):<textarea name='exeact_desc' rows='6' cols='50' >$act_desc</textarea><br>";
				echo"報名費:<input type='text' value='$act_price' name='exeact_price'><br>";
				echo'地點:<select name="exeact_area" value="$act_area">
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
				
echo"開放學齡: 
<input type='checkbox' name='exeact_stage1' vaLue='幼稚園 '>幼稚園
<input type='checkbox' name='exeact_stage2' vaLue='國小 '>國小
<input type='checkbox' name='exeact_stage3' vaLue='國中 '>國中
<input type='checkbox' name='exeact_stage4' vaLue='高中 '>高中
<input type='checkbox' name='exeact_stage5' vaLue='高職 '>高職
<input type='checkbox' name='exeact_stage6' vaLue='大專院校 '>大專院校
<input type='checkbox' name='exeact_stage7' vaLue='研究所 '>研究所
<input type='checkbox' name='exeact_stage8' vaLue='社會人士 '>社會人士
 <br/><br/>";		
				
echo"營隊類型: 
<input type='radio' name='exeact_field' vaLue='1'>法政
<input type='radio' name='exeact_field' vaLue='2'>財經
<input type='radio' name='exeact_field' vaLue='3'>外語
<input type='radio' name='exeact_field' vaLue='4'>數理化學
<input type='radio' name='exeact_field' vaLue='5'>地球與環境
<input type='radio' name='exeact_field' vaLue='6'>資訊
<input type='radio' name='exeact_field' vaLue='7'>生物資源
<input type='radio' name='exeact_field' vaLue='8'>建築
<input type='radio' name='exeact_field' vaLue='9'>設計
<input type='radio' name='exeact_field' vaLue='10'>藝術
<input type='radio' name='exeact_field' vaLue='11'>社會與心理
<input type='radio' name='exeact_field' vaLue='12'>大眾傳播
<input type='radio' name='exeact_field' vaLue='13'>文史哲
<input type='radio' name='exeact_field' vaLue='14'>教育
<input type='radio' name='exeact_field' vaLue='15'>管理
<input type='radio' name='exeact_field' vaLue='16'>運動遊憩
<input type='radio' name='exeact_field' vaLue='17'>工程
<input type='radio' name='exeact_field' vaLue='18'>機器人
<input type='radio' name='exeact_field' vaLue='19'>生命科學
<input type='radio' name='exeact_field' vaLue='20'>醫藥衛生
<input type='radio' name='exeact_field' vaLue='21'>其他
 <br/><br/>";				
				
echo"營隊網站網址: <input type='text' value='$url' name='exeact_url'><br/><br/>";
echo"報名時間: <input type='date' value='$act_signup_starttime' name='exeact_signup_starttime'>";
echo"~ <input type='date' value='$act_signup_endtime' name='exeact_signup_endtime'><br/><br/>";
echo"營期: <input type='date' value='$act_starttime' name='exeact_starttime'>";
echo"~ <input type='date' value='$act_endtime' name='exeact_endtime'><br/><br/>";
echo"聯絡人: <input type='text' value='$act_PICname' name='exeact_PICname'><br/><br/>";
echo"聯絡人電話: <input type='text' value='$act_PICphone' name='exeact_PICphone'><br/><br/>";
echo"舉辦機關: <input type='text' value='$org' name='exeact_ORG'><br/><br/>";				
echo"<input type='submit' value='修改資料'>";
echo"</form>";				
		
			
			
				
	mysqli_close($link);
			?>
	
</body>
</html>
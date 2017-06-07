<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>搜尋結果 : <?php echo $_GET['srch'];?> - CCcamp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container text-center">

        <?php include "header.php"; ?>

        <?php
        $srch = $_GET['srch'];
        include "dbconnect.php";
        
        $result = mysqli_query($link, "SELECT * FROM activity WHERE act_name LIKE '%$srch%' OR act_desc LIKE '%$srch%';");

        if ($result->num_rows == 0 or $_GET['srch'] == '') { ?>

            <div class="row clearfix">
                <div class="col-sm-3 "></div>
                <div class="alert alert-danger col-sm-6" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                很抱歉<br>找不到有關 <b><em><?php echo $srch; ?></em></b> 的營隊<br>請嘗試其他關鍵字
                </div>
                <div class="col-sm-3"></div>
            </div>

        <?php }else { 

		    while( $row = mysqli_fetch_assoc($result)){ ?>

                <div class="row bg-info">

                    <div class="col-sm-3">
                        <img src="<?php echo $row['act_poster'];?>" alt="營隊海報" width=250px height=200px>
                    </div>

                    <div class="col-sm-6 text-left">
                        <h4><b><?php echo $row['act_name'];?></b></h4>
                        <p><?php echo $row['act_desc'];?></p>
                        <p>營隊類型 : <?php echo $row["act_field"] ;?></p>
                        <p>招生對象 : <?php echo $row["act_stage1"];echo $row["act_stage2"];echo $row["act_stage3"];echo $row["act_stage4"];echo $row["act_stage5"];echo $row["act_stage6"];echo $row["act_stage7"];echo $row["act_stage8"];?></p>
                        <p>報名時段 : <?php echo $row["act_signup_starttime"] ;?> 至 <?php echo $row["act_signup_endtime"] ;?></p>
                        <p>舉辦機關 : <a href="supIntro.php?<?php echo $row['act_code'];?>"><?php echo $row['act_ORG']; ?></a></p>
                    </div>

                    <div class="col-sm-3 text-right">
                        <p>活動時間 : <?php echo $row["act_starttime"] ;?> 至 <?php echo $row["act_endtime"] ;?> </p>
                        <p>活動地點 : <?php echo $row["act_area"] ;?></p>
                        <p>活動費用 : <?php echo $row["act_price"] ;?>元</p>
                        <p>負責人 : <?php echo $row["act_PICname"];?>(<?php echo $row["act_PICphone"]; ?>)</p>
                        <a href='<?php echo $row["act_url"] ;?>'><button class="btn btn-primary">查看更多</button></a>
                    </div>
                
                </div>
                <hr>	

            <?php }
            mysqli_close($link);
            } ?>


        <?php include 'footer.php'; ?>
        
    </div>
</body>
</html>
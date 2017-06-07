<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首頁 - CCcamp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container text-center">

        <?php include 'header.php'; 
        include "dbconnect.php";?>

        <div class="jumbotron">
            <h1>CCcamp!</h1>
            <p>這是一個營隊網站</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新活動公告</h3>
                    </div>
                    <div class="panel-body">                
                        <table class="table">
                            <?php
                            
                            $result=mysqli_query($link,"SELECT * FROM news ORDER BY n_code DESC LIMIT 6");

                            
                                echo "<tr><td>公告內容</td>";    
                                echo "<td>公告時間</td></tr>";
                            while($row=mysqli_fetch_assoc($result)){
                                
                                echo"<tr>";
                                echo "<td>".$row["n_content"]."</td>";
                                echo "<td>".$row["n_time"]."</td>";
                                echo "</tr>";
                            }
                            
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新營隊</h3>
                    </div>
                    <div class="panel-body">                
                        <table class="table">
                            <?php
                            
                            $result2 = mysqli_query($link,"SELECT * FROM `activity` ORDER BY `act_code` DESC LIMIT 6");
                            
                            echo "<tr><td>活動名稱</td>";    
                            echo "<td>活動敘述</td>";
                            echo "<td>活動期間</td></tr>";

                            while( $row2 = mysqli_fetch_assoc($result2)){
                                echo"<tr>";
                                echo "<td>";
                                echo $row2["act_name"]."<br>";
                                echo "</td><td>";
                                echo $row2["act_desc"]."<br>";
                                echo "</td><td>";
                                echo $row2["act_starttime"]."至".$row2["act_endtime"];
                                echo "</td></tr>";
                            }
                            
                            
                            mysqli_close($link);
                            ?>
                        </table>
                    </div>
                </div>


            </div>

        </div>


        <?php include 'footer.php'; ?>

    </div>
</body>
</html>
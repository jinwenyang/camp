<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>請登入</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container text-center">

		<?php include 'header.php'; ?>
	
		<div class="row clearfix">
			<div class="col-sm-3"></div>

			<div class="col-sm-6">
				<div class="panel panel-danger">
	                <div class="panel-heading">
	                    <h3 class="panel-title">尚未登入</h3>
	                </div>
	                <div class="panel-body">
	                    <p>請登入</p>
	                </div>
	            </div>
			</div>

			<div class="col-sm-3"></div>

		</div>

		<?php include 'footer.php';?>

	</div>
	
</body>
</html>
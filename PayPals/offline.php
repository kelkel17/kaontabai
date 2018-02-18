<?php 
	include '../Controller/dbconn.php';
	islogged();
	$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Restaurant</title>
	<link href="../something/css/bootstrap.min.css" rel="stylesheet">
	<link href="../something/css/datepicker3.css" rel="stylesheet">
	<link href="../something/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script src="../something/js/jquery.min.js"></script>
	<script src="../something/js/jquery-1.11.1.min.js"></script>
	<script src="../something/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
		<div class="col-sm-8 col-md-4 col-md-offset-6" style="top: -400px;">
			<div class="login-panel panel panel-default">
				  <div class="panel-body">
						<fieldset>
							<div class="form-group">
								<label>Subscription Type</label>
								<input class="form-control" placeholder="Restaurant Hour Open" name="otime" type="time" value="&#8369;<?php echo $row['sub_name'];?>" readonly><br/>
								<label>Amount to be paid</label>
								<input class="form-control" placeholder="Restaurant Hour Open" name="otime" type="time" value="&#8369;<?php echo $row['sub_price'];?>" readonly><br/>
								
							</div>
						</fieldset>
						<form method="POST">
							<input type="submit" name="pay" value="Pay Now!" class="btn btn-primary btn-sm" style="float:right;" type="button">
						</form>
				  </div>
				</div>
			</div><!-- /.col-->
					  
</div><!-- /.row -->		
</body>

</html>
<?php 
	include 'Controller/signinadmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="something/css/bootstrap.min.css" rel="stylesheet">
	<link href="something/css/datepicker3.css" rel="stylesheet">
	<link href="something/css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="assets/img/logo.png">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			<?php
			if(isset($_GET['mess'])){
				$mess = $_GET['mess'];
				echo $mess;
				}
				 ?>
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form action="Controller/signinsystemadmin.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="user" type="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="login" value="Login" class="btn btn-primary btn-lg" type="button">
						</fieldset>

					</form>
			
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="something/js/jquery-1.11.1.min.js"></script>
	<script src="something/js/bootstrap.min.js"></script>
</body>
</html>

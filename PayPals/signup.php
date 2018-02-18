<?php 
	include '../Controller/signinadmin.php';
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
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form action="src/add.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="user" type="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="pass2" type="password" value="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Name" name="restaurantname" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Description" name="restaurantdesc" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Address" name="restaurantaddr" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Contact" name="restaurantcontact" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Hour Open" name="restaurantopen" type="time" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Restaurant Hour Close" name="restaurantclose" type="time" autofocus="">
							</div>
						</fieldset>
					</div>
						<div class="panel-body">	
							<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Firstname" name="fname" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Middle Name" name="mname" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Last Name" name="lname" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contact" name="contact" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Address" name="addr" type="text" autofocus="">
							</div>
							<div class="form-group">
							<label class="form-control">Restaurant Logo:</label>
							<input  type="file" name="image" accept = "image/jpeg/png/jpg" placeholder="Restaurant Logo" />
							</div>
							<!--<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Male">''
								</label>-->
						</div>
							<input type="submit" name="Add" value="Register Restaurant" class="btn btn-primary btn-lg" type="button"></fieldset>
					</form>
			
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="../something/js/jquery-1.11.1.min.js"></script>
	<script src="../something/js/bootstrap.min.js"></script>
</body>
</html>

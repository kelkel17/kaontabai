<?php
	include '../Controller/dbconn.php';
	
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>

	<link href="../something/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<script src="../something/js/jquery.min.js"></script>
	<script src="../something/js/jquery-1.11.1.min.js"></script>
	<script src="../something/js/bootstrap.min.js"></script>
	<title>KaonTaBai!</title>
</head>
<body>
	<header class="cd-main-header">
		<h1>Subscription</h1>
	</header>
	<ul class="cd-pricing">
		
	<?php 
				$con = con();
				$sql = "SELECT * FROM subscriptions";
				$stmt = $con->prepare($sql);
				$stmt->execute();
				$sub = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($sub as $row) {
                    
			?>		
		<li>
			<header class="cd-pricing-header">
				<h2><?php echo $row['sub_name'];?></h2>
               
				<div class="cd-price">
					<span>&#8369; <?php echo $row['sub_price'];?></span>
				</div>
			</header><br /> <!-- .cd-pricing-header -->

			<!-- <div class="cd-pricing-features">
				<ul>
					<li class="available"><em>Feature 1</em></li>
					<li><em>Feature 2</em></li>
					<li><em>Feature 3</em></li>
					<li><em>Feature 4</em></li>
				</ul>
			</div> .cd-pricing-features -->

			<footer class="cd-pricing-footer">
				<a href="#" data-toggle="modal" data-target="#addSub<?php echo $row['sub_id']; ?>">Select</a>
			</footer> <!-- .cd-pricing-footer -->
		</li>
			<div class="modal fade" tabindex="-1" role="dialog" id="addSub<?php echo $row['sub_id']; ?>">
				<div class="modal-dialog" role="document">
					<div class="cd-form">
							<form action="../Controller/RestaurantsController/addadmin.php" method="post">
								<fieldset>
				                   <legend>Account Info</legend>
										<?php 
												if(isset($_GET['id'])){
                                                $owner = getOwner(array($_GET['id']));
                                                foreach($owner as $t){
                                            ?>
										<div class="half-width">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="sub" value="<?php echo $row['sub_id'] ?>">
											<input type="hidden" name="price" value="<?php echo $row['sub_price'] ?>">
											<label for="fName">First Name</label>
                                           
												<input type="text" id="fName" name="fname" value="<?php echo $t['owner_fname']; ?>">
										</div>
										<div class="half-width">
											<label for="mName">Middle Name</label>
												<input type="text" id="mName" name="mname" value="<?php echo $t['owner_mname']; ?>">
										</div>
										<div class="half-width">
											<label for="lName">Last Name</label>
												<input type="text" id="lName" name="lname" value="<?php echo $t['owner_lname']; ?>">
										</div>
										<div class="half-width">
											<label for="userEmail">Username</label>
											<input type="text" id="userEmail" name="username" value="<?php echo $t['username']; ?>">
										</div>
										<div class="half-width">
											<label for="cont">Contact Number</label>
												<input type="text" id="cont" name="contact" value="<?php echo $t['owner_contact']; ?>">
										</div>
										<div class="half-width">
											<label for="addr">Address</label>
												<input type="text" id="addr" name="address" value="<?php echo $t['owner_address']; ?>">
										</div>
										<div class="half-width">
											<label for="userPassword">Password</label>
											<input type="password" id="userPassword" name="password" value="<?php echo $t['password']; ?>">
										</div>
										<div class="half-width">
											<label for="userPasswordRepeat">Repeat Password</label>
											<input type="password" id="userPasswordRepeat" name="password2" value="<?php echo $t['password']; ?>">
										</div>
                                    <?php } }?>
									<div class="half-width">
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
											<input type="hidden" name="sub" value="<?php echo $row['sub_id'] ?>">
											<input type="hidden" name="price" value="<?php echo $row['sub_price'] ?>">
											<label for="fName">First Name</label>
                                           
												<input type="text" id="fName" name="fname">
										</div>
										<div class="half-width">
											<label for="mName">Middle Name</label>
												<input type="text" id="mName" name="mname">
										</div>
										<div class="half-width">
											<label for="lName">Last Name</label>
												<input type="text" id="lName" name="lname">
										</div>
										<div class="half-width">
											<label for="userEmail">Username</label>
											<input type="text" id="userEmail" name="username">
										</div>
										<div class="half-width">
											<label for="cont">Contact Number</label>
												<input type="text" id="cont" name="contact">
										</div>
										<div class="half-width">
											<label for="addr">Address</label>
												<input type="text" id="addr" name="address">
										</div>
										<div class="half-width">
											<label for="userPassword">Password</label>
											<input type="password" id="userPassword" name="password">
										</div>
										<div class="half-width">
											<label for="userPasswordRepeat">Repeat Password</label>
											<input type="password" id="userPasswordRepeat" name="password2">
										</div>
								</fieldset>
								<fieldset>
									<legend>Payment Method</legend>
										<div>
											<ul class="cd-payment-gateways">
												<li>
													<input type="radio" name="payment-method" id="paypal" value="paypal">
													<label for="paypal">Paypal</label>
												</li>
														<!-- 
														<li>
															<input type="radio" name="payment-method" id="card" value="card" checked>
															<label for="card">Card</label>
														</li> -->
											</ul> <!-- .cd-payment-gateways -->
										</div>
								</fieldset>
								<fieldset>
									<div>
										<input type="submit" name="add" value="Get started">
										
									</div>
								</fieldset>
						</form>
							<a href="#0" class="cd-close close" data-dismiss="modal" type="button"></a>
					</div><!-- .cd-form -->
				</div>	
        	</div><!-- end of Add Event modal -->	
	<?php } ?>
	</ul> <!-- .cd-pricing -->


	
	
	<div class="cd-overlay"></div> <!-- shadow layer -->

<script src="js/velocity.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

</body>

</html>
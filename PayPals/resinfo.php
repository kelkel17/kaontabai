<?php 
	//require 'src/start.php';
	include 'dbconn.php';
	islogged();
	// var_dump($user);
	$id = $_SESSION['id'];
?>

<html>
	<body>
		<center>
  		  <form method="" action="payment.php">
  		  
		  <h1>CONFIRM YOUR SUBSCRIPTION!</h1>
		  <br>
		  <input type="submit" value="submit" name="submit">
		</form> 
	</center>
	</body>
</html>

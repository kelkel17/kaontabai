<?php 
	// require 'src/start.php';

	// var_dump($user);
?>

<html>
	<body>
		<center>
  		  <form method="POST" action="src/add.php">
  		  <h2>Owner's INFO</h2>
		  First name:<br>
		  <input type="text" name="firstname" value="">
		  <br>
		  Middle name:<br>
		  <input type="text" name="midname" value="">
		  <br>
		  Last name:<br>
		  <input type="text" name="lastname" value="">
		  <br>
		  Contact No:<br>
		  <input type="text" name="cno" value="">
		  <br>
		  Email:<br>
		  <input type="text" name="email" value="">
		  <br>
		  Address:<br>
		  <input type="text" name="address" value="">
		  <br> 
		  <h2>Restaurant INFO</h2>
		  Restaurant name:<br>
		  <input type="text" name="name" value="">
		  <br>
		  Description:<br>
		  <input type="text" name="desc" value="">
		  <br>
		  Address:<br>
		  <input type="text" name="add" value="">
		  <br>
		  Contact No:<br>
		  <input type="text" name="cno2" value="">
		  <br>
		  Username:<br>
		  <input type="text" name="user" value="">
		  <br>
		  Password:<br>
		  <input type="text" name="pass" value="">
		  <br><br>
		  <input type="submit" value="submit" name="submit">
		</form> 
	</center>
	</body>
</html>

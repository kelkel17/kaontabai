<?php 
	include 'start.php';

	if(isset($_POST['submit']))
	{
		$food1 = $_POST['food1'];
		$food2 = $_POST['food2'];

		$total = ((int)$food1 + (int)$food2);

		$sql = "INSERT INTO transactions(total) 
				VALUES (?)";	

				$db = new PDO('mysql:host = localhost; dbname=paypal','root','');
				$stmt = $db->prepare($sql);
				$stmt->execute(array($total));
		// header("Location: ../resinfo.php");
	}	
?>

<html>
	<body>
		<center>
  		  <form method="" action="../payment.php">
  		  
		  <h1>CONFIRM YOUR SUBSCRIPTION!</h1>
		  <br>
		  <?php echo $total;?>
		  <br>
		  <input type="submit" value="submit" name="submit">
		</form> 
	</center>
	</body>
</html>
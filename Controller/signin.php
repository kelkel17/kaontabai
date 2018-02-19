<?php
include 'dbconn.php';
	//session_start();

	//$email = $password = "";
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$sql = "SELECT * FROM customers WHERE customer_email = ? AND customer_password = ?";
		$con = con();
		$stmt = $con->prepare($sql);
		$stmt->execute(array($email,$password));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0){
			$_SESSION['id'] = $row['customer_id'];
			echo '<script> alert("Welcome '.$row['customer_fname'].'"); window.location="../Model/Customer/loading.php?id='.$row['customer_id'].'" </script>';
		
		}
		else{
			echo '<script> alert("Invalid Username or Password"); window.location="../index.php?mess=Your username or password is incorrect!" </script>';
		}
		
}

		
?>
<?php
include 'dbconn.php';
//	session_start();

	//$userlog = $userpass = "";
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM customers WHERE customer_email = ?";
		$con = con();
		$stmt = $con->prepare($sql);
		$stmt->execute(array($email));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0 && password_verify($password, $row['customer_password'])){
				$_SESSION['id'] = $row['customer_id'];
				echo '<script>window.location="../Model/Customer/loading.php?id='.$row['customer_id'].'" </script>';
		}
		else{
			echo '<script> alert("Invalid Username or Password"); window.location="../index.php?mess=Your username or password is incorrect!" </script>';
		}

	}
		//$con=null;
?>
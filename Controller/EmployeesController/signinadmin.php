<?php
include '../dbconn.php';
//	session_start();

	//$userlog = $userpass = "";
	if(isset($_POST['login']))
	{
		$userlog = $_POST['userlog'];
		$userpass = $_POST['userpass'];
	
		$sql = "SELECT * FROM restaurants WHERE username = '$userlog' AND password = '$userpass'";
		$con = con();
		$stmt = $con->prepare($sql);
		$stmt->execute(array($userlog,$userpass));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 0){
			$_SESSION['id'] = $row['id'];
			header('location:../../View/indexadmin.php');
		}
		else{
			header('location:../../View/loginadmin.php?mess=Your username or password is incorrect!');
		}

	}
		//$con=null;
?>
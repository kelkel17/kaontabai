<?php
include 'dbconn.php';
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d g:i:s');
	$userlog = $userpass = "";
	if(isset($_POST['login']))
	{
		$userlog = $_POST['user'];
		$userpass = $_POST['pass'];
	
		$sql = "SELECT * FROM admin WHERE admin_user = ? AND admin_pass = ?";
		$con = con();
		$stmt = $con->prepare($sql);
		$stmt->execute(array($userlog,$userpass));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['admin_pass'] == $userpass){
			$_SESSION['id'] = $row['admin_id'];
			// header('location:../View/loadingsystem.php?id='.$row['admin_id'].'');	
			header('location:../view/systemadminindex.php?='.$row['admin_id'].'');	
			}
		else
			header('location:../systemadminlogin.php?mess=Your username or password is incorrect!');
	}

		
?>
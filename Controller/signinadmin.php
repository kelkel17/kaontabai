<?php
include 'dbconn.php';
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d g:i:s');
	$userlog = $userpass = "";
	if(isset($_POST['login']))
	{
		$userlog = $_POST['user'];
		$userpass = $_POST['pass'];
	
		$sql = "SELECT * FROM restaurants WHERE username = ? AND password = ?";
		$con = con();
		$stmt = $con->prepare($sql);
		$stmt->execute(array($userlog,$userpass));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row['password'] == $userpass){
				if($row['restaurant_status'] == 0){
						echo '<script>alert("Your account has not yet been verified"); window.location="../paypals/index.php?id='.$row['restaurant_id'].'";</script>';
				}	elseif($row['restaurant_status'] == 1){
						if($row['restaurant_name'] == ''){
						$_SESSION['id'] = $row['restaurant_id'];
										header('location:../View/loading2.php?id='.$row['restaurant_id'].'');
						}
						elseif($row['restaurant_name'] != ''){
							if($stmt->rowCount() > 0){
								$_SESSION['id'] = $row['restaurant_id'];
													header('location:../View/loading.php?id='.$row['restaurant_id'].'');		
							}
					}
				}	
		}else
			header('location:../loginadmin.php?mess=Your username or password is incorrect!');
	}

	if(isset($_POST['loginadmin'])){
		$username = $_POST['user'];
		$password = $_POST['pass'];
		//$data = array($username,$password);
		loginStaff($username,$password);
	}		
?>
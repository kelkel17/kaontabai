<?php

include 'dbconn.php';

	if(isset($_POST['Add']))
	{

		
		// $id = $_SESSION["id"];	
		
		$name = $_POST['restaurantname'];
		$desc = $_POST['restaurantdesc'];
		$add = $_POST['restaurantaddr'];
		$cno2 = $_POST['restaurantcontact'];
		$open = $_POST['restaurantopen'];
		$close = $_POST['restaurantclose'];
		$fname = $_POST['fname'];	
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$cno = $_POST['contact'];
		$email = $_POST['email'];
		$addrs = $_POST['addr'];

		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass2'];
		$image = $_FILES['image']['name'];
		
		if($image!='')
		{	
		//if (move_uploaded_file($image,'../../Image'.$filename)) {
		  	$directory = "../Image/";
		  	$path = time().$image;
		  	if(move_uploaded_file($_FILES['image']['tmp_name'], $directory.$path))
		  	{

	$sql = "SELECT username FROM restaurants WHERE username = :username";
			$con = con();
			$sthandler = $con->prepare($sql);
			$sthandler->bindParam('username', $user);
			$sthandler->execute();

			if($sthandler->rowCount() > 0){
			    echo '<script>alert("Already exist!"); window.location="../../signup.php";</script>';
			}

			elseif($pass==$pass2){

				$sql = "INSERT INTO restaurants(restaurant_name,restaurant_desc,restaurant_addr,restaurant_contact,hour_open,hour_close,owner_fname,owner_mname,owner_lname,owner_contact,owner_email,owner_address,username,password,restaurant_logo) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";	

				$con = con();
				$stmt = $con->prepare($sql);
				$stmt->execute(array($name,$desc,$add,$cno2,$open,$close,$fname,$mname,$lname,$cno,$email,$addrs,$user,$pass,$path));
				$_SESSION['id'] = $con->lastInsertId();
				echo '<script> alert("Success! Go to the last step"); window.location="../resinfo.php" </script>';
				// header("Location: ../resinfo.php");
			}

			else
			{
				echo '<script>alert("Password does not match!"); window.location="../signup.php"; </script>';
			}
		}
	   
	}
}
			$con = null;		
?>
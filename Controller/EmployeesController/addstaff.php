<?php

include '../dbconn.php';


	if(isset($_POST['Add']))
	{
			$id = $_SESSION["id"];		
			$fname = $_POST['fname'];	
			$mname = $_POST['mname'];			
			$lname = $_POST['lname'];
			$addr = $_POST['address'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$ssn = $_POST['ssn'];
			$number = FLOOR(RAND(100,2000));
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$sql1 = "SELECT username FROM employees WHERE username = :username";
			$con = con();
			$sthandler = $con->prepare($sql1);
			$sthandler->bindParam(':username', $username);
			$sthandler->execute();

			if(count($sthandler) > 1){
			    echo '<script>alert("Staff Already Exist!"); window.location="../../Model/Employee/staff.php" </script>';
			} else{
				$data = array($id,$number,$fname,$mname,$lname,$addr,$phone,$gender,$ssn,$username,$password);
				//echo $id,$fname,$mname,$lname,$addr,$phone,$gender,$ssn,$username,$password;
				addStaff($data);
			}
	}
			$con = null;
?>
<?php

	include '../dbconn.php';
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d g:i:s');
	if(isset($_POST['add']))
	{
			$sub = $_POST['sub'];
			$total = $_POST['price'];
			$fname = $_POST['fname'];	
			$mname = $_POST['mname'];			     
			$lname = $_POST['lname'];
			$phone = $_POST['contact'];
			$addr = $_POST['address'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
			$pass2 = $_POST['password2'];
            $id = $_POST['id'];
			// $id = $_GET['id'];
			if($sub == 1){
				$hour = new DateTime($date);
				$hour->add(new DateInterval('P1M'));
				$sub2 = $hour->format('Y-m-d g:i:s');
				
			}elseif($sub == 2){
				$hour = new DateTime($date);
				$hour->add(new DateInterval('P6M'));
				$sub2 = $hour->format('Y-m-d g:i:s');
				
			}
			elseif($sub == 3){
				$hour = new DateTime($date);
				$hour->add(new DateInterval('P1Y'));
				$sub2 = $hour->format('Y-m-d g:i:s');
				
			}
			elseif($sub == 4){
				$hour = new DateTime($date);
				$hour->add(new DateInterval('P7D'));
				$sub2 = $hour->format('Y-m-d g:i:s');
				$total = 1;
				
			}
			
			$sql = "SELECT username FROM restaurants WHERE username = :username";
			$con = con();
			$sthandler = $con->prepare($sql);
			$sthandler->bindParam(':username', $user);
			$sthandler->execute();

			if($sthandler->rowCount() > 0){
                $status = 1;
                $data = array($status, $id);
                ownerStatus($data);
			    echo '<script>alert("Successfully updated your account"); window.location="../../paypals/payment.php?total='.$total.'&id='.$id.'"; </script>';
			} elseif($pass==$pass2){
								$stmt = array($user,$pass,$fname,$mname,$lname,$phone,$addr,$date,$sub2,$sub);
								$id = addOwner($stmt);
				
							echo '<script> alert("Successfully Registered"); window.location="../../paypals/payment.php?total='.$total.'&id='.$id.'"; </script>';
							// }
			} else {
								echo '<script>alert("Password does not match!"); window.location="../../Paypals/index.php"; </script>';
						}	
	}
			$con = null;
?>

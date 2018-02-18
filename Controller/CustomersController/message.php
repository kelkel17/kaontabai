<?php

include '../dbconn.php';

	date_default_timezone_set('Asia/Manila');
		if(isset($_POST['send']))
		{
		
			date_default_timezone_set("Asia/Manila");
			$id = $_SESSION["id"];
			$myID = $_POST['cid'];
			$message = $_POST['message'];	

			$sent = date('F j, Y h:i:s A');	
			// echo $id,$myID,$message,$sent,$receive;
		
				$sql = "INSERT INTO messages(customer_id,restaurant_id,date_time_sent,message) 
					VALUES (?,?,?,?)";	
				// echo $id;
				//echo $message;
				$con = con();
				$stmt = $con->prepare($sql);
				$add = $stmt->execute(array($id,$myID,$sent,$message));
				$row = $con->lastInsertId();
				if($add){

						$sql2 = "INSERT INTO notifications(customer_id,restaurant_id,message_id) VALUES(?,?,?);";
						$true = $con->prepare($sql2);
						$true->execute(array($id,$myID,$row));
						echo '<script> alert("Successfully Sent"); window.location="../../Model/Customer/restaurantinfo.php?cid='.$myID.'&id='.$id.'";</script>';	
				}
		
	}	
			$con = null;

?>
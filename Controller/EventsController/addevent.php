<?php

include '../dbconn.php';
	if(isset($_POST['addvenue']))
	{
		$id = $_SESSION["id"];
		$name = $_POST['name'];	
		$date = $_POST['date'];	
		$venue = $_POST['venue'];		
		$time = $_POST['time'];
		$desc = $_POST['desc'];
		$number = FLOOR(RAND(100,2000));
			$con = con();
			$sql = "SELECT event_name, restaurant_id FROM events WHERE event_name = :name AND restaurant_id = '$id'";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->execute();
			if($stmt->rowCount() > 0)
				echo '<script>alert("Event already exist"); window.location="../../Model/Event/events.php";</script>';
			else{
				$data = array($id,$name,$venue,$date,$time,$desc,$number);
				addEvent($data);
			}
	}
			$con = null;
?>
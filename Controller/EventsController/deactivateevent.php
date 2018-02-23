<?php
	include '../dbconn.php';
	

	if(isset($_POST['open_id'])){
		$id = $_POST['open_id'];
		$stat = "Open";
		$data = array($stat,$id);
		deactivateEvent($data);
		header("Location: ../../Model/Event/events.php");
	}

	if(isset($_POST['event_id'])){
		$id = $_POST['event_id'];
		$stat = "Close";
		$data = array($stat,$id);
		deactivateEvent($data);
	}


?>
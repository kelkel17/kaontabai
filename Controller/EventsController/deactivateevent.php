<?php
	include '../dbconn.php';
	

	if(isset($_POST['open'])){
		$id = $_POST['id'];
		$stat = "Open";
		$data = array($stat,$id);
		deactivateEvent($data);
		header("Location: ../../Model/Event/events.php");
	}

	if(isset($_POST['close'])){
		$id = $_POST['id'];
		$stat = "Close";
		$data = array($stat,$id);
		deactivateEvent($data);
		header("Location: ../../Model/Event/events.php");
	}

?>
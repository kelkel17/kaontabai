<?php
	include '../dbconn.php';

	if(isset($_POST['off'])){
		$id = $_POST['off'];
		$stat = 0;
		$data = array($stat,$id);
		deactivateSchedule($data);
		//header("Location: ../../Model/Schedule/schedules.php");
	}

	if(isset($_POST['peak'])){
		$id = $_POST['peak'];
		$stat = 1;
		$data = array($stat,$id);
		deactivateSchedule($data);
		//header("Location: ../../Model/Schedule/schedules.php");
	}


?>
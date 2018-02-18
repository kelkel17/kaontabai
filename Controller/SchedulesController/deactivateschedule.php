<?php
	include '../dbconn.php';

	if(isset($_POST['off'])){
		$id = $_POST['id'];
		$stat = 0;
		$data = array($stat,$id);
		deactivateSchedule($data);
		header("Location: ../../Model/Schedule/schedules.php");
	}

	if(isset($_POST['peak'])){
		$id = $_POST['id'];
		$stat = 1;
		$data = array($stat,$id);
		deactivateSchedule($data);
		header("Location: ../../Model/Schedule/schedules.php");
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$rid = $_SESSION["id"];
		$sdate = $_POST['sdate'];
		$stime = $_POST['stime'];
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
		$data = array($rid,$sdate,$stime,$edate,$etime,$id);
		updateSchedule($data);
	}
?>
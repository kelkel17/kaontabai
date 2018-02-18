<?php
	include '../dbconn.php';

	if(isset($_POST['deactivate'])){
		$id = $_POST['id'];
		$stat = "Deactivate";
		$data = array($stat,$id);
		deactivateStaff($data);
		header("Location: ../../Model/Employee/staff.php");
	}

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		$stat = "Active";
		$data = array($stat,$id);
		deactivateStaff($data);
		header("Location: ../../Model/Employee/staff.php");
	}
?>
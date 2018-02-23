<?php
	include '../dbconn.php';

	if(isset($_POST['deactivate'])){
		$id = $_POST['deactivate'];
		$stat = "Deactivate";
		$data = array($stat,$id);
		deactivateStaff($data);
		//header("Location: ../../Model/Employee/staff.php");
	}

	if(isset($_POST['activate'])){
		$id = $_POST['activate'];
		$stat = "Active";
		$data = array($stat,$id);
		deactivateStaff($data);
		//header("Location: ../../Model/Employee/staff.php");
	}
?>
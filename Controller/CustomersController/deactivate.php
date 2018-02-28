<?php
	include '../dbconn.php';
	if(isset($_POST['deactivate'])){
		$id = $_POST['deactivate'];
		$stat = "Deactivated";
		$data = array($stat,$id);
		deactivateUser($data);
	//	header("Location: ../../Model/Food/food.php");
	}
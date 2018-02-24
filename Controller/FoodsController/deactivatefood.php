<?php
	include '../dbconn.php';
	if(isset($_POST['deactivate'])){
		$id = $_POST['deactivate'];
		$stat = "Not Available";
		$data = array($stat,$id);
		deactivateProduct($data);
	//	header("Location: ../../Model/Food/food.php");
	}

	if(isset($_POST['activate'])){
		$id = $_POST['activate'];
		$stat = "Available";
		$data = array($stat,$id);
		deactivateProduct($data);
		//header("Location: ../../Model/Food/food.php");
	}

	


?>
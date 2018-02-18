<?php
	include '../dbconn.php';
	if(isset($_POST['deactivate'])){
		$id = $_POST['id'];
		$stat = "Not Available";
		$data = array($stat,$id);
		deactivateProduct($data);
		header("Location: ../../Model/Food/food.php");
	}

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		$stat = "Available";
		$data = array($stat,$id);
		deactivateProduct($data);
		header("Location: ../../Model/Food/food.php");
	}


?>
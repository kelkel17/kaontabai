<?php
	include '../dbconn.php';

	$id = $_GET['id'];
	deactivatebeverage($id);
	header("Location: ../../Model/Beverage/beverage.php")
?>
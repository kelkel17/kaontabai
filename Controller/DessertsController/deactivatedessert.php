<?php
	include '../dbconn.php';

	$id = $_GET['id'];
	deactivatedessert($id);
	header("Location: ../../Model/Dessert/dessert.php")
?>
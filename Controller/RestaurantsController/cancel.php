<?php
	include '../dbconn.php';

	$id = $_GET['id'];
	cancelReservation($id);
	header("Location: ../../Model/Restaurant/reservations.php")
?>
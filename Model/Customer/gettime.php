<?php
include '../Controller/dbconn.php';
header('Content-Type: application/json');

	$con = con();
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT hour_open as open, hour_close as open from restaurants where restaurant_id = ?";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetch(PDO::FETCH_ASSOC);
	$data = array();
	foreach ($info as $ro) {
		$data[] = $ro;
	}
	print json_encode($data);
?>


<?php
include '../../Controller/dbconn.php';
header('Content-Type: application/json');

$con = con();
$id = $_GET['cid'];
// $id = 1;
//$sql = sprintf("SELECT * FROM subscriptions");
$query = "SELECT hour_open as open, hour_close as close from restaurants where restaurant_id = '$id'";
$data = $con->prepare($query);
$data->execute(); 
$info = $data->fetch(PDO::FETCH_ASSOC);
$data = array();
	$data[] = $info;

print json_encode($data);
?>


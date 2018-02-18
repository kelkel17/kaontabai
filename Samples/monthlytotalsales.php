<?php
include '../Controller/dbconn.php';
	islogged();
	header('Content-Type: application/json');
	$id = $_SESSION['id'];
	$con = con();
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT DATE_FORMAT(order_time,'%M %Y') as id, SUM(total_price) AS total FROM orders WHERE restaurant_id = '$id' GROUP BY DATE_FORMAT(order_time, '%M %Y') ORDER BY DATE_FORMAT(order_time, '%M %Y') DESC";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	 foreach ($info as $view) {
  		$data[] = $view;
  
	 }
	print json_encode($data);

?>
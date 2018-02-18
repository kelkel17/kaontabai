<?php
	include '../Controller/dbconn.php';

	islogged();
	header('Content-Type: application/json');
	$id = $_SESSION['id'];
	$con = con();
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT m.m_name as id, SUM(od.order_qty) AS total FROM order_details as od, menus as m, orders as o WHERE od.order_id = o.order_id AND od.menu_id = m.menu_id AND o.restaurant_id = '$id' GROUP BY od.menu_id ORDER BY SUM(od.order_qty) DESC";
	$data = $con->query($query);
	//$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();

	 foreach ($info as $view) {
  		$data[] = $view;
  
	 }
	echo json_encode($data);

?>
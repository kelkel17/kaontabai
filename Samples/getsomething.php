<?php
include '../Controller/dbconn.php';
header('Content-Type: application/json');

// $id = $_SESSION['id'];
$id = 1;
	$con = con();
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT SUM(o.total_price) as total, m.m_name as name, o.order_time as tim FROM menus as m, order_details as od, orders as o WHERE m.menu_id = od.menu_id AND od.order_id = o.order_id AND o.restaurant_id = '$id' GROUP BY date_format(o.order_time, '%d') ORDER BY od.menu_id LIMIT 2";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	foreach ($info as $ro) {
		$data[] = $ro;
	}
	print json_encode($data);
// $sql = "SELECT  SUM(p.purchase_total) as amount FROM tbl_purchase_details as pd, tbl_purchase as p, tbl_products as pr  WHERE pd.purchase_id = p.purchase_id AND pd.product_id = pr.product_id";
   
?>


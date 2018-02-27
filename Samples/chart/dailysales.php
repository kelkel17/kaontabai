<?php
include '../Controller/dbconn.php';
islogged();
header('Content-Type: application/json');
	$con = con();
	$id = $_SESSION['id'];
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT SUM(o.total_price) AS total, o.order_time as tim  FROM  orders as o, restaurants r WHERE o.restaurant_id = '$id' GROUP BY DATE_FORMAT(o.order_time, '%D')";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();


	foreach ($info as $ro) {
	$data [] = $ro;
 }
	print json_encode($data);

// $sql = "SELECT  SUM(p.purchase_total) as amount FROM tbl_purchase_details as pd, tbl_purchase as p, tbl_products as pr  WHERE pd.purchase_id = p.purchase_id AND pd.product_id = pr.product_id";
   
?>

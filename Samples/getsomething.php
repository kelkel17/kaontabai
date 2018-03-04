<?php
include '../Controller/dbconn.php';
//header('Content-Type: application/json');

if(isset($_POST['menuid'])){
	$con = con();
	$menu = $_POST['menuid'];
	$sdate = date('Y-m-d',strtotime($_POST['start']));
	
	$edate = date('Y-m-d',strtotime($_POST['end']));
	
	// $sdate = date('F j, Y',strtotime($_POST['sdate']));
	// $edate = date('F j, Y',strtotime($_POST['edate']));
	$query = "SELECT (od.order_qty * m.m_price) as total, o.order_time as daytime, m.m_name as name FROM menus m, orders o, order_details od WHERE m.menu_id = od.menu_id AND od.menu_id = '$menu' AND od.order_id = o.order_id";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	foreach ($info as $ro) {
		$newdate = date('Y-m-d',strtotime($ro['daytime']));
		// echo 'Mga dates nga wala sa sud: '.$newdate.'<br>';
		if($newdate >= $sdate && $newdate <= $edate){
			$data[] = $ro;
		
		}
	}

	echo json_encode($data);
	
// $sql = "SELECT  SUM(p.purchase_total) as amount FROM tbl_purchase_details as pd, tbl_purchase as p, tbl_products as pr  WHERE pd.purchase_id = p.purchase_id AND pd.product_id = pr.product_id";
}
?>


<?php
include '../Controller/dbconn.php';
header('Content-Type: application/json');

// if(isset($_POST['sales'])){
	$con = con();
	$menu = 1;
	$sdate = date('2018-03-03');
	$edate = date('2018-03-11');
	$newsdate = date('F j, Y',strtotime($sdate));
	$newedate = date('F j, Y',strtotime($edate));
	echo $newsdate.'<br>';
	echo $newedate.'<br>';
	// $sdate = date('F j, Y',strtotime($_POST['sdate']));
	// $edate = date('F j, Y',strtotime($_POST['edate']));
	$query = "SELECT (od.order_qty * m.m_price) as total, o.order_time as daytime FROM menus m, orders o, order_details od WHERE m.menu_id = od.menu_id AND od.menu_id = '$menu' AND od.order_id = o.order_id";
	$data = $con->prepare($query);
	$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data = array();
	foreach ($info as $ro) {
		$newdate = date('F j, Y', strtotime($ro['daytime']));
		// $data[] = $ro;
		if($newsdate >= $newdate && $newedate <= $newdate){
			$data[] = $ro;
			// echo $data[];
		}
		else{
			echo 'wala';
		}	
	}
	print json_encode($data);
	
// $sql = "SELECT  SUM(p.purchase_total) as amount FROM tbl_purchase_details as pd, tbl_purchase as p, tbl_products as pr  WHERE pd.purchase_id = p.purchase_id AND pd.product_id = pr.product_id";
// }
?>


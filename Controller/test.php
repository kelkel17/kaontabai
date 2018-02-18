<?php
	include 'dbconn.php';
	date_default_timezone_get('Asia/Manila');
	$con = con();
	$date = date('Y-m-d g:i:s');
	$sql2 = "SELECT * FROM orders";
	$stmt2 = $con->prepare($sql2);
	$stmt2->execute();
	$view2 = $stmt2->fetchAll();
	$time = date('09:00:00');
	for ($i=0; $i <12 ; $i++)  	{$temp = date('09:00:00').strtotime($time) + 1;}
		echo $temp;

	// $time2 = date('10:00:00');
	// $time3 = date('11:00:00');
	// $time4 = date('12:00:00');
	// $time5 = date('13:00:00');
	// $time6 = date('14:00:00');
	// $time7 = date('15:00:00');
	// $time8 = date('16:00:00');
	// $time9 = date('17:00:00');
	// $time10 = date('18:00:00');
	// $time11 = date('19:00:00');
	// $time12 = date('20:00:00');
	// $time13 = date('21:00:00');
	// echo $key['order_time'];
	//$date2 = NOW();
	$sql = "SELECT COUNT(order_number) FROM orders WHERE order_time = '$date'";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$view = $stmt->fetchColumn();

	// echo $view;
	// foreach ($view as $key) {
	// 			// $view = ($key['order_time'], INTERVAL - "1 days"); 
	// 		echo 'OrderId: '.$key['order_number'].' ';
			 
	// 		echo 'OrderTime: '.$key['order_time'];
	// 		 echo "<br/> ";
	// 		 	// $temp = $key['order_time'] + $date;
	// 		 	// $temp2 = $key[];
	// }

				// echo 'Test1: '.$temp.(date_format('Y-m-d g:i:s')).'<br/>';
			 echo 'Now: '.$date;
			 
?>
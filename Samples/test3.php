<?php
	include '../Controller/dbconn.php';

	$con = con();
	 date_default_timezone_set('Asia/Manila');
	
	$sql = "SELECT count(o.order_id) AS total,  o.order_time as day, o.order_id as od, r.hour_open as open, r.hour_close as close FROM  orders as o, restaurants as r WHERE o.restaurant_id = r.restaurant_id GROUP BY date_format(o.order_time, '%h  %D') ORDER BY o.order_id DESC";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//$temp 
	foreach ($row as $view) {
		echo 'Order ID:'.$view['od'].'<br/>';
		echo 'Order Time:'.$view['day'].'<br/>';
		echo 'Total Order:'.$view['total'].'<br/>';
		
		$test = date_create($view['day'])->format("h:i:s");
		//echo $test;

		// if($test >= $view['day']){
		// 	echo 'New: '.count($view['od']);
		// 	echo '<br>';
		// }
		
		echo '<br>';


			// $test2 = date_create($view['day']);
		//$test3 = $test2->format('h');
		//echo 'Total Order: '.$test2.'<br/>';
		
		// $open = date_create($view['open']);
		// $open2 = $open->format('h:i:s');
		// echo 'Open Time: '.$open2.'<br/>';
		// $close = date_create($view['open']);
		// $close2 = $open->format('h:i:s');
		// echo 'Open Time: '.$close2.'<br/>';

		//$test = date_create($view['day']);
		//$test2 = $test->format('h');
		//echo 'Get: '.$test2.'<br/>';
		
		// $hour = new DateTime($test2);
		// $hour->add(new DateInterval('PT1H'));
		// echo 'Test3: '.$hour->format('h:i:s').'<br/>';
		// echo '<br>';
	
		
	}
		//$test2 = $view['day'];
		//if($test2 >= $view['day']){
			// $temp = $view['total'] + $view['total'];
			// echo 'New Total: '.$temp.'<br>';
			// echo 'New Order Count: '.count($view['total']).'<br/>';
				// $sql = "SELECT count(order_id) as count, date_format(order_time, '%i') as dat FROM orders GROUP BY date_format(order_time, '%i')";
				// $stmt = $con->prepare($sql);
				// $stmt->execute();
				// $row = $stmt->fetch(PDO::FETCH_ASSOC); 
				// echo 'New Count: '.$row['count'].'<br/>';
				// echo 'New Time: '.$row['dat'].'<br/>';
		//}
		
?>
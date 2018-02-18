
<?php
include '../Controller/dbconn.php';
islogged();
	header('Content-Type: application/json');
	$id = $_SESSION['id'];
	$con = con();
	//$sql = sprintf("SELECT * FROM subscriptions");
	$query = "SELECT DATE_FORMAT(o.order_time, '%D %M %Y') as tim, COUNT(od.order_id) AS total FROM orders o, order_details od WHERE od.order_id = o.order_id AND o.restaurant_id = '$id' GROUP BY DATE_FORMAT(o.order_time, '%D %M %Y') ORDER BY DATE_FORMAT(o.order_time, '%D %M %Y')";
	$data = $con->query($query);
	//$data->execute(); 
	$info = $data->fetchAll(PDO::FETCH_ASSOC);
	$data2 = array();
	 foreach ($info as $view) {
  		$data2[] = $view;
  
	 }
	print json_encode($data2);

?>	
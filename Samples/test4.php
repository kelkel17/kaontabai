<?php
// 	include '../Controller/dbconn.php';
// 	date_default_timezone_set('Asia/Manila');
// 	$date = date('Y-m-d');
// 	$con = con();
// 	$sql = "SELECT sum(r.no_of_guests) as total, res.max_capacity as max, r.reservation_date as dat, res.restaurant_id as id, o.status as stat FROM reservations r, restaurants res, orders o WHERE r.restaurant_id = res.restaurant_id AND o.reservation_id = r.reservation_number AND r.res_status = 'Reserved' GROUP BY DATE_FORMAT(r.reservation_date, '%D')";
// 	$stmt = $con->prepare($sql);
// 	$stmt->execute();
// 	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	foreach ($row as $view){
// 		// print_r($view);
// 		//echo date('Y-m-d',strtotime($view['dat'])).'<br>';
// 		// echo $date;
// 		$new = date('Y-m-d',strtotime($view['dat']));
// 		if($view['stat'] == 'Served' || $view['stat'] == 'Cancelled'){
// 			$temp = $view['max'] - $view['total'];
// 			$id = $view['id'];
// 			 $status = 0;
// 			 $date2 = date('Y-m-d h');
// 			 $number = FLOOR(RAND(1000,10000));
// 			 $data = array($id,$status,$number);
// 			 autoAdd($data);
// 			 echo "GO";
// 			}elseif($view['stat'] == 'Cooking' || $view['stat'] == 'Ready'){
// 			$temp = 0;
// 			$temp = $temp + $view['total'];
// 			if($date = $new){
// 				if($temp == $view['max']){
// 					$id = $view['id'];
// 					$set = getAdd(array($id));
// 					foreach ($set as $row) {
					
// 						$get = $row['sched_id'];
// 						$status = 1;
// 						$data = array($id,$status,$get);
// 						updateAdd($data);
// 						echo "Done";
// 					}	
// 				}
// 			}
// 		}	
// 	}
	
	// $filename = '../Image/blank.jpg';
	// if ((file_exists($filename))) {
 //    echo '<img src="../Image/blank.jpg">';
	// } else {
	//     echo "The file $filename does not exist";
	// }

	// $con = con();
	// $sql = "SELECT * FROM orders as o, order_details as od WHERE od.order_id = o.order_id GROUP BY od.order_id";
	// $stmt = $con->prepare($sql);
	// $stmt->execute();
	// $view = $stmt->fetch(PDO::FETCH_ASSOC);
	// foreach ($view as $row) {
	// 	$temp = count($row['menu_id']) * 2;		
	// 	echo $temp;
	// }	
	// date_default_timezone_set('Asia/Manila');
	// $date = date('Y-m-d g:i:s');
	// echo $date.'<br/>';
	// $hour = new DateTime($date);
	// $hour->add(new DateInterval('P1Y'));
	// echo 'Test3: '.$hour->format('Y-m-d g:i:s').'<br/>';
	// echo '<br>';
	// // if(isset($_POST['add'])){
	// 	//$date = $_POST['date'];
	// 	//$time = $_POST['time'];
		// $checkbox = $_POST['check'];
		// $checkbox2 = "";
		// foreach ($checkbox as $check) {
		// 		$checkbox2 .= $check.',';
		// 	}

	// 			$con = con();
	// 			$sql = "INSERT INTO tests(checkbox) VALUES(?)";
	// 			$stmt = $con->prepare($sql);
	// 			$add = $stmt->execute(array($checkbox2));
	// 			$con = null;
	// 			if($add == 1){
	// 				echo '<script>alert("Successfully added!")</script>';
	// 			}	
		
	// }

	// 	if(isset($_POST['submit'])){
	// 	$date = $_POST['date'];
	// 	$time = $_POST['time'];
	// 	// $checkbox = $_POST['time'];
	// 	// $checkbox2 = "";
	// 	// foreach ($checkbox as $check) {
	// 	// 		$checkbox2 .= $check.',';
	// 	// 	}

	// 			$con = con();
	// 			$sql = "INSERT INTO tests(datet,timet) VALUES(?,?)";
	// 			$stmt = $con->prepare($sql);
	// 			$add = $stmt->execute(array($date,$time));
	// 			$con = null;
	// 			if($add == 1){
	// 				echo '<script>alert("Successfully added!")</script>';
	// 			}	
		
	// }
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="../assets/css/jquery-ui.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
  	 	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<!-- <script src="../something/js/bootstrap.min.js"></script> -->
  	<script>
	  $( function() {
	  $( "#datepicker" ).datepicker({
	   		minDate: -0,
	   		maxDate: "+14D",
	  		changeMonth: true,
     		changeYear: true, 
      		numberOfMonths: 1 });
	   
	 
	  });
	  

  </script>

</head>
<body>
<!-- <form method="post">
<input type="checkbox" name="check[]" value="Promo1">Promo1
<input type="checkbox" name="check[]" value="Promo2">Promo2
<input type="checkbox" name="check[]" value="Promo3">Promo3
<input type="checkbox" name="check[]" value="Promo4">Promo4
<input type="submit" name="add" value="Send">
</form>


<lable>Date</lable>
<input type="date" name="date" />
<label>Time</label>
<input type="time" name="time" />

 -->
<form method="post">
<p>Date: <input type="text" id="datepicker" name="date"></p>
Time: <input id="durationExample" type="text" name="time" />
<input type="submit" name="submit" value="Send">
</form>
<!-- <select>
	<option value="14">2 Weeks</option>
	<option value="14">3 Weeks</option>
	<option value="1">1 Month</option>
	<option value="2">2 Months</option>

</select> -->
</body>
</html>

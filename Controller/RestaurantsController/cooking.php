<?php
	include '../dbconn.php';


	if(isset($_POST['ready'])){
		$id = $_POST['ready'];
		$stat = "Ready";
		$data = array($stat,$id);
		$order = getOrder(array($id));
		$email = $order['customer_email'];
		$from = $order['owner_email'];
		$subject = ''.$order['customer_fname'].' '.$order['customer_lname'].'  your order is ready';
		$body = 'Your order is ready to be serve your order number is '.$order['order_number'].' please bring your phone or a photocopy of your reservation & order details'; 
			orderStatus($data);
			mail($email,$subject,$body,$from);
		//	header("Location: ../../Model/Restaurant/story.php");
	}

	if(isset($_POST['cook'])){
		$id = $_POST['cook'];
		$stat = "Cooking";
		// $points = 0;
		$data = array($stat,$id);
		orderStatus($data);
		//header("Location: ../../Model/Restaurant/story.php");
	}

	if(isset($_POST['cancel'])){
		$id = $_POST['cancel'];
		$stat = "Cancelled";
		$data = array($stat,$id);
		$order = getOrder(array($id));
		$email = $order['customer_email'];
		$from = $order['owner_email'];
		$subject = ''.$order['customer_fname'].' '.$order['customer_lname'].'  your order has been cancelled';
		$body = 'Your order has been cancelled please contact the restaurant for more information'; 
			orderStatus($data);
			mail($email,$subject,$body,$from);
		//	header("Location: ../../Model/Restaurant/story.php");
	}

	if(isset($_POST['served'])){
		$id = $_POST['served'];
		$stat = "Served";
		// $points = 0;
		$data = array($stat,$id);
		orderStatus($data);
	//	header("Location: ../../Model/Restaurant/story.php");
	}

	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');
	$con = con();
	$id = $_SESSION['id'];
	$sql = "SELECT sum(r.no_of_guests) as total, res.max_capacity as max, r.reservation_date as dat, o.status as stat FROM reservations r, restaurants res, orders o WHERE r.restaurant_id = res.restaurant_id AND o.reservation_id = r.reservation_number AND r.res_status = 'Reserved' AND res.restaurant_id = '$id' GROUP BY DATE_FORMAT(r.reservation_date, '%D')";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$new = date('Y-m-d',strtotime($row['dat']));
		if($row['stat'] == 'Served' || $row['stat'] == 'Cancelled'){
			$temp = $row['max'] - $row['total'];
			$set = getAdd(array($id));
			$get = $set['sched_id'];
			 $status = 0;
			 $date2 = date('Y-m-d h');
			 $data = array($id,$status,$get);
			 updateAdd($data);
			 echo "GO";
			}elseif($row['stat'] == 'Ready'){
			$temp = 0;
			$temp = $temp + $row['total'];
			if($date == $new){
				if($temp == $row['max']){
						
						$get = $row['sched_id'];
						$status = 1;
						$number = FLOOR(RAND(1000,10000));
						$data = array($id,$status,$number);
						autoAdd($data);
						echo "Done";
					
				}
			}
		}		

	

?>
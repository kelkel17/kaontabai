<?php
	include '../dbconn.php';
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');

	if(isset($_POST['accept'])){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$stat = "Reserved";
		if($table == 0){
			$data = array($stat,$id);
			$con = con();
			$sql = "SELECT * from reservations r, customers c, restaurants s WHERE r.customer_id = c.customer_id AND r.restaurant_id = s.restaurant_id AND r.reservation_id = '$id'";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($row as $get) {
				$email = $get['customer_email'];
				$from  = $get['owner_email'];
				acceptReservation($data);
					$res = getReservation2(array($id));
					foreach ($res as $key) {
						$subject = 'Your reservation request has been accepted';
						$body = ''.$get['customer_fname'].' '.$get['customer_lname'].' your reservation has been accepted your reservation number is '.$key['reservation_number'].'';
							mail($email,$subject,$body,$from);
							// $test = viewAllReservations2(array($_SESSION['id']));
							// foreach($test as $t){
							// 	$date2 = date('Y-m-d',strtotime($t['dat']));
							// 	if($date == $date2 && $key['res_status'] == 'Reserved'){
							// 		$temp = 0;
							// 		$temp = $key['no_of_guests'];
							// 	}	
							// }
								
							echo '<script> window.location="../../Model/Restaurant/reservations.php"; </script>';
						
					}
			}
		}else{
				$status = 1;
				$dat = array($status,$table);
				$data = array($stat,$id);
				changeTable($dat);
				$con = con();
				$sql = "SELECT * from reservations r, customers c WHERE r.customer_id = c.customer_id AND r.reservation_id = '$id'";
				$stmt = $con->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($row as $get) {
					$email = $get['customer_email'];
					acceptReservation($data);
						$res = getReservation2(array($id));
						foreach ($res as $key) {
							$subject = 'Your reservation request has been accepted';
							$body = ''.$get['customer_fname'].' '.$get['customer_lname'].' your reservation has been accepted your reservation number is '.$key['reservation_number'].'';
							mail($email,$subject,$body,'From: KaonTaBai!');
							echo '<script> window.location="../../Model/Restaurant/reservations.php"; </script>';
							
						}
				}
		}
	}


	if(isset($_POST['cancel'])){
		$id = $_POST['id'];
		$table = $_POST['table'];
		$stat = "Cancelled";
		if($table == 0){
			$data = array($stat,$id);
			$con = con();
			$sql = "SELECT * from reservations r, customers c WHERE r.customer_id = c.customer_id AND r.reservation_id = '$id'";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($row as $get) {
				$email = $get['customer_email'];
				acceptReservation($data);
					$res = getReservation2(array($id));
					foreach ($res as $key) {
						$subject = 'Your reservation request has been cancelled';
						$body = ''.$get['customer_fname'].' '.$get['customer_lname'].' your reservation has been cancelled your reservation number is '.$key['reservation_number'].'';
						mail($email,$subject,$body,'From: KaonTaBai!');
						echo '<script> window.location="../../Model/Restaurant/reservations.php"; </script>';
					}
			}
		}else{
			$status = 0;
			$dat = array($status,$table);
			$data = array($stat,$id);
			changeTable($dat);
			$con = con();
			$sql = "SELECT * from reservations r, customers c WHERE r.customer_id = c.customer_id AND r.reservation_id = '$id'";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($row as $get) {
				$email = $get['customer_email'];
				acceptReservation($data);
					$res = getReservation2(array($id));
					foreach ($res as $key) {
						$subject = 'Your reservation request has been cancelled';
						$body = ''.$get['customer_fname'].' '.$get['customer_lname'].' your reservation has been cancelled your reservation number is '.$key['reservation_number'].'';
						mail($email,$subject,$body,'From: KaonTaBai!');
						echo '<script> window.location="../../Model/Restaurant/reservations.php"; </script>';
					}
			}
		}		
	}
	


?>
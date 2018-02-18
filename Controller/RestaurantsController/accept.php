<?php
	include '../dbconn.php';
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
							//mail($email,$subject,$body,$from);
								$asd = $_SESSION['id'];
								date_default_timezone_set("Asia/Manila");
								$date2 = date('Y-m-d');
								$sql2 = "SELECT SUM(r.no_of_guests) as guest, t.max_capacity, r.reservation_date, r.res_status FROM reservations as r, restaurants as t WHERE r.restaurant_id = t.restaurant_id AND r.restaurant_id = '$asd' AND r.reservation_id = '$id' GROUP BY r.reservation_date";
								$stmt2 = $con->prepare($sql2);
								$stmt2->execute();
								$rsd = $stmt2->fetchAll(PDO::FETCH_ASSOC);
								foreach($rsd as $r){
									print_r($r);
									$date5 = date('Y-m-d', strtotime($r['reservation_date']));
									if($date2 <= $date5){
											echo 'parihag adlaw';
										if($r['res_status']=='Reserved'){ 
												//echo 'parihag status';
											if($r['max_capacity'] <= $r['guest'])
												{
													$status = 1;
													$number = FLOOR(RAND(1000,50000));
													$data = array($asd,$date5,$status,$number);
													autoAdd2($data);
												}
												else if($r['max_capacity'] > $r['guest']){
													echo 'pero dili sila equal';
													$get = getAdd(array($asd));
													$status = 0;
													//print_R ($get);
													$data = array($asd,$status,$get['sched_id']);
													updateAdd2($data);
													break;
												}
										}
									   
									}
									elseif($date2 > $date5){
												echo 'dili parihag adlaw';
												$get = getAdd2(array($date5));
												$status = 0;
												print_r($get);
											   foreach($get as $jkl){
												$date6 = date('Y-m-d', strtotime($jkl['sched_sdate']));
													  $data = array($asd,$status,$jkl['sched_id']);
													  updateAdd2($data);
										
												}
											
									}
								}
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
							//mail($email,$subject,$body,'From: KaonTaBai!');
							foreach($rsd as $r){
								print_r($r);
								$date5 = date('Y-m-d', strtotime($r['reservation_date']));
								if($date2 == $date5){
										echo 'parihag adlaw';
									if($r['res_status']=='Reserved'){ 
											//echo 'parihag status';
										if($r['max_capacity'] <= $r['guest'])
											{
												$status = 1;
												$number = FLOOR(RAND(1000,50000));
												$data = array($asd,$date5,$status,$number);
												autoAdd2($data);
											}
											else if($r['max_capacity'] > $r['guest']){
												echo 'pero dili sila equal';
												$get = getAdd(array($asd));
												$status = 0;
												//print_R ($get);
												$data = array($asd,$status,$get['sched_id']);
												updateAdd2($data);
												break;
											}
									}
								   
								}
								elseif($date2 > $date5){
											echo 'dili parihag adlaw';
											$get = getAdd2(array($date5));
											$status = 0;
											print_r($get);
										   foreach($get as $jkl){
											$date6 = date('Y-m-d', strtotime($jkl['sched_sdate']));
												  $data = array($asd,$status,$jkl['sched_id']);
												  updateAdd2($data);
									
											}
										
								}
							}
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

<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(resid,cusId,number){
	$(function(){
		swal({
				title:"Successful!",
				text:"Order something for your reservation to be valid",
				icon: "warning"
		}).then(function(){
				window.location = "../../Model/Customer/menu.php?cid="+resid+"&pid="+cusId+"&rid="+number;
			});
		});
	}

	function warningAlert(resId,cusId){
		$(function(){
			swal({
				title:"Failed",
				text:"You already reserved to that date & time!",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Customer/restaurantinfo.php?cid="+resId+"&id="+cusId;
			});
		});
	}

	function editSuccess(id){
		$(function(){
			swal({
				title:"Successfully",
				text:"Updated your reservation",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Customer/customerprofile.php?id="+id;
			});
		});
	}

</script>

<?php

include '../dbconn.php';
			if(isset($_POST['submit']))
			{
				$id = $_SESSION["id"];
				$myID = $_GET['cid'];
				$date = $_POST['dat'];
				$time = $_POST['tim'];
				$number = FLOOR(RAND(10000,50000));
				$request = $_POST['special'];
				$guest = $_POST['guest']; 
				$sql = "SELECT * FROM reservations WHERE reservation_date = :dat AND restaurant_id = :cid AND customer_id = :id";
				// $sql2 = "SELECT * FROM reservations WHERE restaurant_id = :'cid'";
				// $sql3 = "SELECT * FROM reservations WHERE customer_id = :'id'";
					$con = con();
					$sthandler = $con->prepare($sql);
					// $sthandler2 = $con->prepare($sql2);
					// $sthandler3 = $con->prepare($sql3);
					$sthandler->bindParam(':dat', $date);		
					$sthandler->bindParam(':cid', $myID);
					$sthandler->bindParam(':id', $id);
					$sthandler->execute();
					// $sthandler2->execute();
					// $sthandler3->execute();
					// if()
					if($sthandler->rowCount() > 0)
					    echo '<script>warningAlert('.$myID.','.$id.');</script>';
					else{
						$data = array($id,$myID,$date,$time,$request,$guest,$number);
						addReservation($data);
						$view =	getReservation(array($id));
						foreach ($view as $row) {
							
							$get = $row['reservation_id'];
							$sql2 = "INSERT INTO notifications(customer_id,restaurant_id,reservation_id) VALUES (?,?,?)";
							$true = $con->prepare($sql2);
							$true->execute(array($id,$myID,$get));
							$res = getOwner(array($myID));
							foreach($res as $ro) {
								$newguest = $ro['temp'] + $guest;
								updateTemp(array($newguest,$myID));
								$cus = getCustomer(array($id));
								foreach ($cus as $c) {

										$email = $ro['owner_email'];
										$message = 'You have new reservation from '.$c['customer_fname'].' '.$c['customer_lname'].' at '.date('F j, Y g:i', strtotime($date)).'.';
										mail($email,'New Reservation',$message,'From: KaonTaBai!');
										echo '<script>sweetMimitch('.$myID.','.$id.','.$number.'); </script>';
									}
							}
						}
					
					}			
			}

	if(isset($_POST['edit'])){
		//$id = $_SESSION["id"];
		$date = $_POST['dat'];
		$myID = $_POST['id'];
		$id = $_POST['rid'];
		$time = $_POST['tim'];
		$guest = $_POST['guest'];
		$special = $_POST['special'];

		$data = array($date,$time,$guest,$special,$id);
		cancelReservation($data);
		$newguest = $ro['temp'] + $guest;
		updateTemp(array($newguest));
		echo '<script>editSuccess('.$id.');</script>';

	}	

	if(isset($_GET['cid'])){
			if(isset($_POST['book']))
			{
				$id = $_SESSION["id"];
				$myID = $_POST['cid'];
				$date = $_POST['dat'];
				$time = $_POST['tim'];
				$table = $_POST['table'];
				$number = FLOOR(RAND(10000,50000));
				$request = $_POST['special'];
				$guest = $_POST['guest']; 
				$sql = "SELECT * FROM reservations WHERE reservation_date = :dat";
				$sql2 = "SELECT * FROM reservations WHERE restaurant_id = :'cid'";
				$sql3 = "SELECT * FROM reservations WHERE customer_id = :'id'";
					$con = con();
					$sthandler = $con->prepare($sql);
					$sthandler2 = $con->prepare($sql2);
					$sthandler3 = $con->prepare($sql3);
					$sthandler->bindParam(':dat', $date);		
					$sthandler2->bindParam(':cid', $myID);
					$sthandler3->bindParam(':id', $id);
					$sthandler->execute();
					$sthandler2->execute();
					$sthandler3->execute();
					// if()
					if($sthandler->rowCount() > 0 && $sthandler2->rowCount() > 0 && $sthandler3->rowCount() > 0)
					    echo '<script>alert("You already reserved to that date & time!"); window.location="../../Model/Customer/tables.php?cid='.$_GET['cid'].'&id='.$id.'";</script>';
					else{
							$data = array($id,$myID,$table,$date,$time,$request,$guest,$number);
							addReservation2($data);
							$view =	getReservation(array($id));
							foreach ($view as $row) {

								$get = $row['reservation_id'];
								$sql2 = "INSERT INTO notifications(customer_id,restaurant_id,reservation_id) VALUES (?,?,?)";
								$true = $con->prepare($sql2);
								$true->execute(array($id,$myID,$get));
								$res = getOwner(array($myID));
								foreach($res as $ro) {
									$newguest = $ro['temp'] + $guest;
									updateTemp(array($newguest,$myID));
									$cus = getCustomer(array($id));
									foreach ($cus as $c) {
									
										$email = $ro['owner_email'];
										$message = 'You have new reservation from '.$c['customer_fname'].' '.$c['customer_lname'].' at '.date('F j, Y g:i', strtotime($date)).'.';
										mail($email,'New Reservation',$message,'From: KaonTaBai!');
											echo '<script>sweetMimitch('.$myID.','.$id.','.$number.');</script>';
										}
								}
							}
						
						}
			}
		}
		
?>

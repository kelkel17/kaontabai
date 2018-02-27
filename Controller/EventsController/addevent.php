<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(){
	$(function(){
		swal({
				title:"Successfully",
				text:"Added an Event",
				icon: "success"
		}).then(function(){
				window.location = "../../Model/Event/events.php";
			});
		});
	}
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Succsfully Updated an event",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Event/events.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating an event",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Event/events.php";
			});
		});
	}
	function warningAlert(){
		$(function(){
			swal({
				title:"Image type error",
				text:"Image type must be PNG/JPEG/JPG only",
				icon: "warning"
			}).then(function(){
					window.location = "../../Model/Event/events.php";
			});
		});
	}
	function warningAlert2(){
		$(function(){
			swal({
				title:"Error in adding an event",
				text:"Event already exist",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Event/events.php";
			});
		});
	}
	function errorAlert(){
		$(function(){
			swal({
				title:"Error in adding a combo meal",
				text:"",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Event/events.php";
			});
		});
	}
</script>
<?php

include '../dbconn.php';
	if(isset($_POST['addvenue']))
	{
		$id = $_SESSION["id"];
		$name = $_POST['name'];	
		$date = $_POST['date'];	
		$venue = $_POST['venue'];		
		$time = $_POST['time'];
		$desc = $_POST['desc'];
		$number = FLOOR(RAND(100,2000));
			$con = con();
			$sql = "SELECT event_name, restaurant_id FROM events WHERE event_name = :name AND restaurant_id = '$id'";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(':name', $name);
			$stmt->execute();
			if($stmt->rowCount() > 0)
				echo '<script>warningAlert2();</script>';
			else{
				$data = array($id,$name,$venue,$date,$time,$desc,$number);
				if(addEvent($data) !== FALSE)
					echo '<script>sweetMimitch();</script>';
				else
					echo '<script>errorAlert();</script>';
			}
	}
	if(isset($_POST['updateEvent']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];	
		$date = $_POST['date'];	
		$venue = $_POST['venue'];			
		$time = $_POST['time'];
		$desc = $_POST['desc'];

			$data = array($name,$venue,$date,$time,$desc,$id);
			if(updateEvent($data) !== FALSE)
				echo '<script>updateAlert();</script>';
			else
				echo '<script>errorUpdateAlert();</script>';
	}
?>
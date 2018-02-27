<script src="../../something/js/jquery.min.js"></script>
<script src="../../something/js/sweetalert.min.js"></script>
<script>
	function sweetMimitch(){
	$(function(){
		swal({
				title:"Successfully",
				text:"Added an Schedule",
				icon: "success"
		}).then(function(){
				window.location = "../../Model/Schedule/schedules.php";
			});
		});
	}
	function updateAlert(){
		$(function(){
			swal({
				title:"Successfully",
				text:"Succsfully Updated an Schedule",
				icon: "success"
			}).then(function(){
					window.location = "../../Model/Schedule/schedules.php";
			});
		});
	}
	function errorUpdateAlert(){
		$(function(){
			swal({
				title:"Error",
				text:"Error in Updating an schedule",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Schedule/schedules.php";
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
					window.location = "../../Model/Schedule/schedules.php";
			});
		});
	}
	function warningAlert2(){
		$(function(){
			swal({
				title:"Error in adding an Schedule",
				text:"Schedule already exist",
				icon: "error"
			}).then(function(){
					window.location = "../../Model/Schedule/schedules.php";
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
					window.location = "../../Model/Schedule/schedules.php";
			});
		});
	}
</script>
<?php

include '../dbconn.php';
	if(isset($_POST['Add']))
	{
		$id = $_SESSION["id"];	
		$date = $_POST['sdate'];
		$time = $_POST['stime'];
		$date2 = $_POST['edate'];
		$time2 = $_POST['etime']; 
		$number = FLOOR(RAND(100,2000));
			$data = array($id,$date,$time,$date2,$time2,$number);
		
		if(addSchedule($data) !== FALSE)
			echo '<script> sweetMimitch();</script>';	
		else	
			echo '<script> errorAlert();</script>';		
	}

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$rid = $_SESSION["id"];
		$sdate = $_POST['sdate'];
		$stime = $_POST['stime'];
		$edate = $_POST['edate'];
		$etime = $_POST['etime'];
			$data = array($rid,$sdate,$stime,$edate,$etime,$id);
	
		if(updateSchedule($data) !== FALSE)
				echo '<script> updateAlert();</script>';	
		else
			echo '<script> errorUpdateAlert();</script>';	
	

	}

	
?>
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
			addSchedule($data);
			echo '<script> alert("Successfully Added a Schedule"); window.location="../../Model/Schedule/schedules.php" </script>';			
	}
			$con = null;
?>
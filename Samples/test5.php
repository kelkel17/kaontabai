<?php
	include '../Controller/dbconn.php';
	date_default_timezone_set('Asia/Manila');
	$con = con();
	$sql = "SELECT * FROM notifications ORDER BY time_receive";
	$st = $con->prepare($sql);
	$st->execute();
	$view = $st->fetchAll(PDO::FETCH_ASSOC);
	foreach ($view as $row) {

	}
	echo 'ID: '.$row['notification_id'].'<br>';
	$mydate =  date('F j, Y h:i:s A', strtotime("2018-03-02 04:20:33"));
	$date2 = date('F j, Y h:i:s A');
	echo 'Date Now: '.$date2.'<br>';
	echo 'Date Created: '.$mydate.'<br>';
	echo 'Date from DB: '.date('F j, Y h:i:s A', strtotime($row['time_receive'])).'<br/>';
	$date = date('Y-m-d h:i:s', strtotime($row['time_receive']));

	echo 'Date Now: '.time_ago($date2).'<br/>';
	echo 'Date Created: '.time_ago($mydate).'<br/>';
	echo 'Date from DB: '.time_ago($date).'<br/>';
	
?>
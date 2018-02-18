<?php
include '../dbconn.php';

 $con = con();
 if(isset($_POST['view']))
 {
if($_POST['view'] != '')
{

		$sql3="UPDATE notifications SET status=1 WHERE status=0"; 
		//$sql3="UPDATE notifications SET status=1 WHERE status=0"; 
		$result2 = $con->prepare($sql3);
		$result2->execute();
}
$sql2 = "SELECT * FROM messages m, notifications n, reservation r WHERE  n.message_id = m.message_id, n.reservation_id = r.reservation_id ORDER by date_time_receive";
$stmt = $con->prepare($sql2);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  
				
$output = '';
if($stmt->rowCount()>0)
{
	//$rows = $stmt->fetchAll();
 	foreach ($rows as $row) 
	{
		$output .='';
		
	}
}
	else
	{
		$output .= '
			<li><a href="#">No Notification Found</a></li>
		';
	}
$sql="SELECT * FROM notifications WHERE status=0"; 
$result = $con->prepare($sql);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);
$count = $result->rowCount();
$data = array(
	'notification' => $output,
	'unseen_notification' => $count
);

	echo json_encode($data);

 }
?>
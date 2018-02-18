<?php
include '../dbconn.php';

 $con = con();
 if(isset($_SESSION['id'])){	
	$id = $_SESSION['id'];
 if(isset($_POST['view']))
 {
if($_POST['view'] != '')
{		
		$sql3="UPDATE notifications SET status=1 WHERE restaurant_id = $id AND status=0";
		$result2 = $con->prepare($sql3);
		$result2->execute();
}
$sql2 = "SELECT * FROM customers c, messages m WHERE  m.customer_id = c.customer_id AND m.restaurant_id = $id ORDER by date_time_receive desc LIMIT 5";

$stmt = $con->prepare($sql2);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  	
$output = '';
if(count($stmt)>0)
{
	//$rows = $stmt->fetchAll();
 	foreach ($rows as $row) 
	{

$date = date('g:i A', strtotime($row['date_time_receive']));		
		$output .='
			
						
			<li><h5>From: '.$row['customer_fname'].' '.$row['customer_lname'].'</h5></li>

			<div class="dropdown-messages-box pull-left">
				  <div class="message-body">
					<li><h5>Message: '.$row['message'].'</h5></li>
					 <small class="pull-right">
						<li>'.time_ago($date).'</li></small>
						<br />
				  </div>
			</div>
			<li class="divider"></li>
			<div class="all-button"><a href="../Model/Restaurant/visitor.php">
									<em class="fa fa-inbox"></em>Reply '.$row['customer_fname'].'</strong>
								</a></div>
							
								<li class="divider"></li>
		';
		
	}
}
	else
	{
		$output .= '
			<li><a href="#">No Message</a></li>
			<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
				<a href="#">
				  <div class="message-body">
					<li>No Message</li>
					 <small class="pull-right"></a>
						<li></li></small>
						<br />
				  </div>
				</a>
			</div>
			<li class="divider"></li>
			<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong></strong>
								</a></div>
				<li class="divider"></li>					

		';
	}

$sql="SELECT * FROM notifications WHERE status=0 AND restaurant_id = $id"; 
$result = $con->prepare($sql);
$result->execute();
$row = $result->fetchAll(PDO::FETCH_ASSOC);
$count = $result->rowCount();
$data = array(
	'notification' => $output,
	'unseen_notification' => $count
);

	echo json_encode($data);

 }}
?>
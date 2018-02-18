<?php 
    include('../dbconn.php');
	if(isset($_POST['reply'])){
            $message = $_POST['message'];
			$customer = getSingleCustomer(array($_POST['cid']));
            $email = $customer['customer_email'];
			$restaurant = getSingleOwner(array($_POST['rid']));
			$resEmail = $restaurant['restaurant_name'];
            $subject = 'New message from '.$resEmail.'';
            // $sent = date('F j, Y h:i:s A');	
			// $sql = "INSERT INTO messages(customer_id,restaurant_id,date_time_sent,message)  VALUES (?,?,?,?)";	
			// 	$con = con();
			// 	$stmt = $con->prepare($sql);
            //     $add = $stmt->execute(array($_POST['cid'],$_POST['rid'],$sent,$message));
            //     $con = null;
            mail($email,$subject,$message,'From '.$resEmail.'');
            //echo '<script>alert("Succesfully Sent"); window.location="../../Model/Restaurant/visitor.php?id='.$restaurant['restaurant_id'].'";</script>';
    }	
?>  
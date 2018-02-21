<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


// include '../Controller/dbconn.php';
require 'src/start.php';



 // $Resid = $_GET['cid']; 
if(isset($_GET['approved'])) {

	$approved = $_GET['approved'] == 'true';

	if($approved) {

		$payerId = $_GET['PayerID'];


		// Get payment_id from db
		$paymentId = $db->prepare("
			SELECT payment_id 
			FROM orders 
			WHERE hash = :hash
			");


		$paymentId->execute(['hash' => $_SESSION['paypal_hash']]); 

		$paymentId = $paymentId->fetchObject()->payment_id;


		$payment = Payment::get($paymentId, $api);

		// var_dump($payment);
		// die();
		//Get the Paypal payment
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		// Execute PayPal payment (charge)
		$payment->execute($execution, $api);

		$upDateTransaction = $db->prepare("UPDATE orders SET order_status=1 WHERE payment_id = :payment_id");

		$upDateTransaction->execute(['payment_id'=>$paymentId]);



		// $setMember = $db->prepare("UPDATE orders SET order_status=1 WHERE order_id = :order_id");

		// $setMember->execute([
		// 	'order_id' => $_SESSION['customer_id']
		// ]);

		unset($_SESSION['paypal_hash']);
		unset($_SESSION['cart']);
	    unset($_SESSION['count']); 
	    unset($_SESSION['qty']);
	    $id = $_SESSION['id'];

		echo '<script>alert("Succesfully paid your order!");window.location="customerprofile.php?id='.$id.'";</script>';



	} else {
		header ('Location: cart.php');
	}
}
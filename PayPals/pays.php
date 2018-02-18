<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require 'src/start.php';



if(isset($_GET['approved'])) {


	$approved = $_GET['approved'] == 'true';

	if($approved) {

		$payerId = $_GET['PayerID'];

		// Get payment_id from db
		$paymentId = $db->prepare("
			SELECT payment_id
			FROM transactions
			WHERE hash = :hash
			");
		
		// $paymentId = $db->prepare("
  //       SELECT * FROM user WHERE id = :user_id 
  //       ");

		$paymentId->execute(['hash' => $_SESSION['paypal_hash']]); 
		$paymentId = $paymentId->fetchObject()->payment_id;

	    // var_dump($paymentId);
	    // die();
		$id = $_GET['id'];
	
		$payment = Payment::get($paymentId, $api);

		// var_dump($payment);
		// die();
		//Get the Paypal payment
		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		// Execute PayPal payment (charge)
		$payment->execute($execution, $api);

		$upDateTransaction = $db->prepare("UPDATE transactions SET complete=1 WHERE payment_id = :payment_id");

		$upDateTransaction->execute(['payment_id'=>$paymentId]);

		

		$setMember = $db->prepare("UPDATE restaurants SET restaurant_status=1 WHERE restaurant_id = :restaurant_id");

		$setMember->execute(['restaurant_id' => $id]);

		unset($_SESSION['paypal_hash']);

		header('Location: ../loginadmin.php');


	} else {
		header ('Location: cancelled.php');
	}
}
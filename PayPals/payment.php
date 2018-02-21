<?php
use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Item;
use PayPal\Api\Itemlist;
use PayPal\Excepion\PPConnectionException;

//include '../../Controller/dbconn.php';
require 'src/start.php';
//isLogged3();


$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment = new Payment();
$redirectUrls = new RedirectUrls();
$item = new Item();
	
$shippingPrice = 0;
$currency = "PHP";
$total=$_GET['total'];
$id  = $_GET['id'];

	
//Payer
$payer->setPaymentMethod('paypal');

//Items
$item->setName('Product Name')
	->setCurrency($currency)
	->setQuantity(1)
	->setSku('12345')
	->setPrice($total);

//Details
$details->setShipping($shippingPrice)
	->setTax(0)
	->setSubtotal($total);

//Amount
$amount->setCurrency($currency)
	->setTotal($total + $shippingPrice)
	->setDetails($details);

//Transactions
$transaction->setAmount($amount)
	->setDescription('Payment');

//Payments
$payment->setIntent('sale')
	->setPayer($payer)
	->setTransactions([$transaction]);

//Redorect URLs
$redirectUrls->setReturnUrl('http://localhost/kaontabai2/kaontabai/paypals/pays.php?approved=true&id='.$id.'')
	->setCancelUrl('http://localhost/kaontabai2/kaontabai/paypals/cancelled.php?approved=false');

$payment->setRedirectUrls($redirectUrls);

//update info of restaurant



try{


	$payment->create($api);

	// Generate and store hash
	$hash = md5($payment->getID());
	$_SESSION['paypal_hash'] = $hash;

	// Prepare and execute transaction storage
	$store = $db->prepare("INSERT INTO transactions (restaurant_id,total_price,payment_id,hash,complete) VALUES ($id, $total , :payment_id, :hash, 0)");
	
	$store->execute([
		// 'restaurant_id'=> $id,
		'payment_id' => $payment->getId(),
		// 'sub_price' => $total,
		'hash' => $hash

	]);

} catch (PPConnectionException $e){
	echo 'Error u idiot';
	header('Location: error.php');
}

foreach($payment->getLinks() as $link){
	if($link->getRel() == 'approval_url'){
		$redirectUrls = $link->getHref();
	}

}

// var_dump($redirectUrls)
header('Location: '.$redirectUrls);
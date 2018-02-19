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
use PayPal\Api\Payee;


 // include 'purchase.php';
require 'src/start.php';

$shippingPrice = 0;
$currency = "PHP";
$total=$_GET['total'];
$cid = $_GET['rid'];
$email = $_GET['email'];


$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment = new Payment();
$redirectUrls = new RedirectUrls();
$item = new Item();
$payee = new Payee();

//Payer
$payer->setPaymentMethod('paypal');

//Payee
$payee->setEmail($email);

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
	->setDescription('Payment')
	->setPayee($payee);

//Payments
$payment->setIntent('sale')
	->setPayer($payer)
	->setTransactions([$transaction]);

//Redorect URLs
$redirectUrls->setReturnUrl('http://localhost/kaontabai2/kaontabai/model/customer/pays.php?approved=true&cid=$cid')
	->setCancelUrl('http://localhost/kaontabai2/kaontabai/model/customer/cancelled.php?approved=false&cid=$cid');

$payment->setRedirectUrls($redirectUrls);

try{
	$payment->create($api);

	// Generate and store hash
	$hash = md5($payment->getID());
	$_SESSION['paypal_hash'] = $hash;

	// Prepare and execute transaction storage
	// $store = $db->prepare("INSERT INTO orders (customer_id, payment_id, total_price, hash, order_status) VALUES 
	// 	(:customer_id, :payment_id, $total ,:hash, 0)");

	$store = $db->prepare("UPDATE orders SET payment_id=:payment_id,hash=:hash, total_price=:total_price WHERE order_id = :order_id");

		$store->execute([
			'payment_id' => $payment->getId(),
			'hash' => $hash,
			'total_price' => $total,
			'order_id' => $_GET['cid']
		]);

	// $order_id = $db->prepare("SELECT order_id FROM orders");
	// $order_id->execute()->fetchAll(PDO::FETCH_ASSOC);

	// $store = $db-prepare("UPDATE orders SET payment_id=:payment_id, hash=:hash WHERE order_id=:order_id");
	
	$store->execute([
		'customer_id'=> $_SESSION['id'],
		'payment_id' => $payment->getId(),
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
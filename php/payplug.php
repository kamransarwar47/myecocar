<?php
$totalTTC = "";
$clientID = 1;
$ticket = 1;
if (!empty($totalTTC) && !empty($clientID) && !empty($ticket))
{
	require_once("payplug/lib/Payplug.php");
	Payplug::setConfigFromFile("payplug/parameters.json");

	// INFORMATIONS DE LA TRANSACTION
	$amout = number_format($totalTTC, 2, '', '');
	$firstName = (empty($firstName)) ? 'Jerome' : $firstName;
	$lastName = (empty($lastName)) ? 'Rebois' : $lastName;
	$customer = $clientID;
	$order = $ticket;

	$paymentUrl = PaymentUrl::generateUrl(array(
										  'amount' => $amout,
										  'currency' => 'EUR',
										  'ipnUrl' => 'http://www.bcomenet.com/php/payplug/ipn.php',
										  'email' => 'direction@bcomenet.com',
										  'firstName' => $firstName,
										  'lastName' => $lastName,
										  'customer' => $customer,
										  'order' => $order,
										  'returnUrl' => 'http://www.bcomenet.com/?return'
										  ));

	// Redirects the user to the payment page
	header("Location: $paymentUrl");
	exit();
}
?>
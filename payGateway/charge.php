<?php

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51Je5wyKX5rSdLKC8Jqk8KxX8rBQxQdQVukrbXhfoDJievZglL4wbiWt9BFO8lSfqJr8cI8qkIeSKQhoZDG1YxbAV00PLo2s61k');

$first_name = htmlspecialchars($_REQUEST['first_name']); 
$last_name = htmlspecialchars($_REQUEST['last_name']);
$email = htmlspecialchars($_REQUEST['email']);
$token = htmlspecialchars($_REQUEST['stripeToken']);
$amount = number_format($_POST['amount']);

$pure_amount = str_replace(array(','),'',$amount);

//Create customer in stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//Charge customer
$charge = \Stripe\Charge::create(array(
    "amount" => $pure_amount,
    "currency" => "usd",
    "description" => "Intro To React Course",
    "customer" => $customer->id
));

//Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

header('Location: success.php?tid='.$charge->id.'& product='.$charge->description);

?>
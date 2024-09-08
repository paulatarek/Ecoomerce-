<?php
require 'vendor/autoload.php';
$stripe = new \Stripe\StripeClient(  config('services.stripe.secret_key'));

try {
  $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
  $customer = $stripe->customers->retrieve($session->customer);
  echo "<h1>Thanks for your order, $customer->name!</h1>";
  http_response_code(200);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}

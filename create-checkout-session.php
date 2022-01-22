<?php

require 'vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51KKgO6KRUwad0BLlPJtHWEe0OO3bhS6YYo8xZ1NCtZa3Q0zgg05r9iY6EjizFS25zKQHAtIai6hF6ihJwjWvIR0z00khV0Oj1a');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://ll.checkout.test/public';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1KKhJ4KRUwad0BLl3Rce9aWd',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);
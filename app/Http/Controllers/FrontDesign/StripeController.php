<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function show()
    {
        return view('FrontDesign.contact');
    }
    public  $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(
            config('services.stripe.secret_key')
        );
    }

    public function pay(Order $order)
    {

$domain =public_path();

   $checkout_session = $this->stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'T-shirt',
      ],
      'unit_amount' =>  $order->total_price *100,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost:4242/success',
  'cancel_url' => 'http://localhost:4242/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

// dd($checkout_session);

return redirect()->away($checkout_session->url);



    Payment::create([
        "order_id" => $order->id,
        "amount" => $order->total_price,
        "currancy" => "usd",
        "method" => "pyment_stripe",
        "status" =>1,
        "transaction_id" => $checkout_session->id,
        "transaction_data" => Carbon::class,
        ]);
}







}

<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Order $order)
    {
        // dd($order);
        return view('FrontDesign.payment',compact("order"));
    }

    public function PaymentIntents(Order $order)
    {

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
       $PaymentIntent =  $stripe->paymentIntents->create([
          'amount' =>$order->total_price,
          'currency' => 'usd',
          'automatic_payment_methods' => ['enabled' => true],
        ]);
        return [
            'clientSecret' => $PaymentIntent->client_secret,
        ];
    }

    public function confirm(Request $requst , Order $order)
    {
        // dd( $requst->all());
    }
}

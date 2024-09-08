<?php

namespace App\Http\Controllers\FrontDesign;

use Throwable;
use App\Models\User;
use App\Models\Order;
use App\Mail\OrderEmail;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AddressRequest;
use App\Jobs\OrderJop;
use PhpParser\Node\Stmt\Else_;

class CheckOutController extends Controller
{
    public function create()

    {
        if (Auth::guard()->check()) {
            $user_id = Auth::guard()->user()->id;
            $user = User::find($user_id);
        }
        $datacart =  $user->products;


        $sumprice =  $user->products->sum('price')   ;

        return view('FrontDesign.checkout',compact('datacart','sumprice'));
    }

    public function store(AddressRequest $request)
    {



        if (Auth::guard()->check()) {
            $user_id = Auth::guard()->user()->id;
            $user = User::find($user_id);
        }

      foreach($user->products as $datas)
      {
        $qntyofproduct =  $datas->pivot->sum('total') ;
        // dd($qntyofproduct);
      }
      DB::beginTransaction();

      if(isset($qntyofproduct))
      {
        $ordercreate = Order::create([
            'payment_method' => 'cod',
            'total_price' => $qntyofproduct ,
            'status' => 1,
            'user_id'=> $user_id,
            'cupon_id'=> '2',

        ]);
      }else
      {
        return redirect()->route('home');
      }



        foreach($user->products as $datas)
        {
            $ordercreate->products()->attach($datas->id,[
                'price' =>$datas->price ,
                'qty' =>$qntyofproduct,
            ]);

        }

foreach(Order::all() as $orders)
{

}



            OrderAddress::create([
                "first_name" =>  $request->first_name,
                "last_name" =>  $request->last_name,
                "email" => $request->email,
                "phone" =>  $request->phone_number,
                "street_address" =>  $request->street_address,
                "city" =>  $request->city,
                "state" =>  $request->state,
                "postal_code" => 'null',
                "country" =>  "eg",
                "type" => 'shipping',
                "order_id" =>$orders->id
            ]);



            dispatch(new OrderJop($request->all()));

            DB::table('carts')->delete();

            DB::commit();

            return redirect()->route('stripe',$ordercreate->id );



      }





    }


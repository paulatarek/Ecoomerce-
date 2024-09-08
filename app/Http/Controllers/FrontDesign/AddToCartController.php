<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToCartController extends Controller
{
    public function addtocart(Request $requset)
    {

        if(Auth::guard()->check())
        {
            $user_id =   Auth::guard()->user()->id;
            $user =   User::find($user_id);
            $price =   DB::table('products')->where('id', $requset->id_product)->first()->price;

            $issetproduct  = DB::table('carts')->where('user_id', $user_id)->where('product_id', $requset->id_product)->first();
            if ($issetproduct) {
                DB::table('carts')->where('user_id', $user_id)->where('product_id', $requset->id_product)->increment('qty');
                DB::table('carts')->where('user_id', $user_id)->where('product_id', $requset->id_product)->update(['total' => $price * ($issetproduct->qty + 1)]);
                echo 'The number of products has increased. Please check your card';
            } else {

                $user->products()->attach($requset->id_product, [
                    'qty' => 1,
                    'price' => $price,
                    'total' => $price
                ]);
                echo 'The product has been added please check your cart';

            }
        }else{
            echo 'please login first';
        }


    }

    public function delete_item(Request $request)
    {

        if(Auth::guard()->check())
        {

   DB::table('carts')->where('product_id', $request->item_id)->delete();
   return back();



        }
    }
}

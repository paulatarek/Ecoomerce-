<?php

namespace App\Http\Controllers\FrontDesign;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShowCartController extends Controller
{
    public function showcart()
    {
        if(Auth::guard()->check())
        {
            $user_id =   Auth::guard()->user()->id;
            $user =   User::find( $user_id );
            $sum =  $user->products->sum('price');
            $count =  $user->products->count();

            $data =  $user->products;

            return view('FrontDesign.cart',compact('data','sum','count'));
        }else
        {
            return back()->with('errorlogin','  Please Login First');
        }




    }
}

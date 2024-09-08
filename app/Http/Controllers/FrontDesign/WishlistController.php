<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::guard()->check())
        {
            $id_user =  Auth::guard()->user()->id;
            $user =User::find($id_user);
   $added_done =   $user->products_wishlists()->syncWithoutDetaching($request->id_product);

        }
    }

    public function show()
    {
        if(Auth::guard()->check())
        {
            $id_user =  Auth::guard()->user()->id;
            $user = User::find($id_user);
            view('FrontDesign.indexpage',compact('user'));

        return  view('FrontDesign.wishlist',compact('user'));



        }
    }
}

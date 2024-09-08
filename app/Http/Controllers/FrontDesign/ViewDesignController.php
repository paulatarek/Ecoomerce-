<?php

namespace App\Http\Controllers\FrontDesign;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\catogry;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class ViewDesignController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $data = Product::all();
        $offer=  Offer::find(1);
        $offer1=  Offer::find(2);





        $catogry = catogry::all();
         view('FrontDesign.frontlayout.navbar',compact('catogry'));

        return view('FrontDesign.indexpage',compact('data','catogry','offer','offer1'));
        // return view('FrontDesign.index',compact('data'));

    }
}

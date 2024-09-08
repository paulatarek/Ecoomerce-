<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailsProductController extends Controller
{
    public function detailsproduct(Request $id)
    {
       $id_product =$id->id;
      $product =  DB::table('products')->where('id',$id_product)->first();


        return view('FrontDesign.product-details',compact('product'));
    }
}

<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\catogry;
use App\Models\Product;
use App\Traits\FilterProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopGridsController extends Controller
{
    use FilterProducts ;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      
        $query = Product::query();
        $brand = Brand::all();

        $product =   $this->filter_search($request,$query);
        $product =   $this->filter_brand($request,$query);

        if(isset($request->price) && ($request->price != null) )
        {
            $query = DB::table('products')->whereBetween('price',[$request->price,$request->price+100]);
        }

        $product = $query->get();

        return view('FrontDesign.product-grids',compact('product','brand'));
    }
}

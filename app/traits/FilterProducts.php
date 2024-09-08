<?php
namespace App\Traits;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

trait FilterProducts{
    public function filter_search($request,$query)
    {

        if(isset($request->title) && ($request->title != null) )
        {
           return  $query->where('name','like','%'. $request->title.'%');
        }

    }
    public function filter_brand($request,$query)
    {


        if(isset($request->brand) && ($request->brand != null) )
        {
      return      $query->whereHas('brand',function($Dumy) use($request){
                $Dumy->whereIn('id',$request->brand);
            });
        }

    }

  


}


?>

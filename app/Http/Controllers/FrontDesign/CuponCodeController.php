<?php

namespace App\Http\Controllers\FrontDesign;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CuponCodeController extends Controller
{
    public function index(Request $request)
    {

        $code =   DB::table('cupons')->where('code',$request->code )->first();


        // Cupon::upd
      $discount =   $code->discount;
        if(auth::guard()->check())
        {
            $id_user = auth::guard()->user()->id;
           $total_amount  = DB::table('carts')->where('user_id',$id_user)->get()->sum('total');

        }
        $updateqnty=   DB::table('cupons')->where('code',$request->code )->update([
            "qnty" =>$code->qnty +1
        ]);


        if($code->max_user_cupon > $code->qnty )
        {
         $now = Carbon::now();

         if($code->start_at < $now)
         {
        return "cupon dont start";
         }

         if($code->end_at > $now)
         {
        return "cupon expire";
         }

            $discoount =  $discount * $total_amount / 100 ;

            return  $totalafterdiscount =  $total_amount - $discoount  ;

        }
        else{
            return "CUPON Max Used";
        }





    }
}

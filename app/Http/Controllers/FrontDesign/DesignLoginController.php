<?php

namespace App\Http\Controllers\FrontDesign;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheakDesignRequets;

class DesignLoginController extends Controller
{
    public function index()
    {
        return view('FrontDesign.login');
    }
    public function cheak(CheakDesignRequets $request)
    {

        // dd($request);
        if(Auth::guard()->attempt(['email' => $request->input('email'), 'password' =>$request->input('password')]))
        {

            return redirect()->intended('design/view');

        }else{
            return redirect()->route('login')->with('error','email or password incorrect');
        }



    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }

}

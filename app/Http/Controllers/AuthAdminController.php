<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginCheakRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AuthAdminController extends Controller
{
    //
    public function index()
    {
return view('AdminBanal.Auth.login');
    }
    public function cheak(LoginCheakRequest $request)
    {
        // dd($request->all());
        // echo$request->input('email');
        // echo$request->input('password');

        if(Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' =>$request->input('password')]))
        {

            return redirect()->intended('daspoard/admin/');

        }
        else{
        return redirect()->route('admin')->with('fail','email or mobile not corected');
        }


    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->back();
    }
}

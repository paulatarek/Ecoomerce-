<?php

namespace App\Http\Controllers\FrontDesign;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDesignRequest;
use App\Mail\EmailVerify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('FrontDesign.register');
    }

    public function store(RegisterDesignRequest $request)
    {
        // dd($request->all());
   $email =   $request->input('email');
   $name =   $request->input('name');

     $create =       User::make([
            'name' => $request->name,
           'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            // 'email_verified_at' =>now(),

        ]);
        $create->save();
        $create->markEmailAsVerified();

        DB::transaction(function ()  use ($email,$name) {
            Mail::to($email)->send(new EmailVerify($name));
        });
        // return view('FrontDesign.indexpage');
        
    }
}

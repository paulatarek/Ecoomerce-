<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('FrontDesign.contact');
    }

    public function store(Request $request)
    {
        Contact::create([
            'name'=>$request->name,
            'subject'=>$request->subject,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
        ]);
        return back();
    }
}

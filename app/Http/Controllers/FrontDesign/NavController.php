<?php

namespace App\Http\Controllers\FrontDesign;

use App\Http\Controllers\Controller;
use App\Models\catogry;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
       $catogry =  catogry::all();

    return   view('FrontDesign.frontlayout.navbar',compact('catogry'));
    }
}

<?php

namespace App\Http\Controllers\FrontDesgin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('FrontDesign.about-us');
    }
}

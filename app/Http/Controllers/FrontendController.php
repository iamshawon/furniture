<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }


    public function blog(){
        return view('layouts.blog');
    }


    public function contactUs(){
        return view('layouts.contact_us');
    }


    public function services(){
        return view('layouts.services');
    }

    public function shop(){
        return view('layouts.shop');
    }


    public function aboutUs(){
        return view('layouts.about-us');
    }


    public function cart(){
        return view('layouts.cart');
    }


    public function checkout(){
        return view('layouts.checkout');
    }

    
    public function thankYou(){
        return view('layouts.thank_you');
    }
}

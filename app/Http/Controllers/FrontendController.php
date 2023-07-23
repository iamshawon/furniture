<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }


    public function blog(){
        return view('blog');
    }


    public function contactUs(){
        return view('contact_us');
    }


    public function services(){
        return view('services');
    }

    public function shop(){
        return view('shop');
    }


    public function aboutUs(){
        return view('about-us');
    }


    public function cart(){
        return view('cart');
    }


    public function checkout(){
        return view('checkout');
    }


    public function thankYou(){
        return view('thank_you');
    }
}

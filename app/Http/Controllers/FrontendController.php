<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |  HOME
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return view('frontend.home.index');
    }



    /*
    |--------------------------------------------------------------------------
    |  ABOUT US
    |--------------------------------------------------------------------------
    */
    public function aboutUs()
    {
        return view('frontend.about.about-us');
    }



    /*
    |--------------------------------------------------------------------------
    |  CONTACT US
    |--------------------------------------------------------------------------
    */
    public function contactUs()
    {
        return view('frontend.contact.contact_us');
    }




    /*
    |--------------------------------------------------------------------------
    |  SERVICES
    |--------------------------------------------------------------------------
    */
    public function services()
    {
        return view('frontend.services.index');
    }



    /*
    |--------------------------------------------------------------------------
    |  SHOP
    |--------------------------------------------------------------------------
    */
    public function shop()
    {
        return view('frontend.shop.index');
    }



    /*
    |--------------------------------------------------------------------------
    |  BLOG
    |--------------------------------------------------------------------------
    */
    public function blog()
    {
        return view('frontend.blog.index');
    }




    /*
    |--------------------------------------------------------------------------
    |  E-COMMERCE
    |--------------------------------------------------------------------------
    */
    public function cart()
    {
        return view('frontend.ecommerce.cart');
    }


    public function checkout()
    {
        return view('frontend.ecommerce.checkout');
    }


    public function thankYou()
    {
        return view('frontend.ecommerce.thank_you');
    }
}

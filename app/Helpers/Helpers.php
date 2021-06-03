<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('random_code')){

    function cart_items(){
        if (!Session::get('cart')){
            Session::put('cart', []);
        }
        return Session::get('cart');
    }
}

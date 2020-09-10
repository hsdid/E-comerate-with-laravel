<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    
    public $cart;
    
    public function __construct(){
        
        $this->cart = new Cart();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(8)->get();
       
        $incart = $this->cart->inCart();

        return view("welcome")->with([

            'products' => $products,
            'incart' => $incart
        ]);
    }

   
}

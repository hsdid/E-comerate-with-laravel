<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use App\SaveForLater;
use App\Category;
use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    
    public $cart;
    public $saved;

    public function __construct(){
        
        $this->saved = new SaveForLater();
        $this->cart = new Cart();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->inRandomOrder()->take(8)->get();
        $categories = Category::all();
        $incart = $this->cart->inCart();
        $inSaved = $this->saved->inSaved();

        return view("welcome")->with([

            'products' => $products,
            'incart' => $incart,
            'inSaved' => $inSaved,
            'categories' => $categories
        ]);
    }

   
}

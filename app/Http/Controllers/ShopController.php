<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;


class ShopController extends Controller
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
        $products = Product::inRandomOrder()->take(12)->get();
       
        $incart = $this->cart->inCart();

        return view('shop')->with([
            'products' => $products,
            'incart' => $incart
        ]);
    }

    
    
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        
        $mightAlsoLike = Product::where('slug','!=',$slug)->MightAlsoLike()->take(4)->get();
        
        $incart = $this->cart->inCart();

        return view('product')->with([
            
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
            'incart' => $incart
        


        ]);
    }

}

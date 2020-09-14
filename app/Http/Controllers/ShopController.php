<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\SaveForLater;
use App\Category;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    
    public $cart;
    public $saved;

    public function __construct(){
        $this->cart = new Cart();
        $this->saved = new SaveForLater();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {   

        $pagination = 9;
        $categories = Category::all();

        if(request()->category) {

            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            });
            
            $heder = $categories->where('slug',request()->category)->first()->name;
           
        } else {
            $heder = 'products';
            $products = Product::where('featured',true)->take(12);
           
        }

        if(request()->sort == 'low_high'){

            $products = $products->orderBy('price')->paginate( $pagination);
        }elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price', 'desc')->paginate( $pagination);
        } else {
            $products = $products->paginate( $pagination);
        }


        $incart = $this->cart->inCart();
        $inSaved = $this->saved->inSaved();
        
        return view('shop')->with([
            'products' => $products,
            'categories'=> $categories,
            'incart' => $incart,
            'inSaved' => $inSaved,
            'heder' => $heder

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

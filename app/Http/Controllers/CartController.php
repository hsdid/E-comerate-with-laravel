<?php

namespace App\Http\Controllers;
use App\SaveForLater;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
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
        $mightAlsoLike = Product::MightAlsoLike()->get();
        $products = Cart::all();
        
        $incart = $this->cart->inCart();
        $totalPrice = $this->cart->totalPrice();
        
        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'products' => $products,
            'totalPrice' => $totalPrice,
            'incart' => $incart
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add product to cart
        $this->cart->id = $request->id;
        $this->cart->product_name = $request->name;
        $this->cart->product_price = $request->price;
        
        $this->cart->save();
       

        $products = Cart::all();
        
        $incart = $this->cart->inCart();

        return redirect()->route('cart.index')->with([
            'succes_message' => 'Item was added to your cart!',
            'incart' => $incart
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Cart::findOrFail($id);

        $product->delete();

        return back()->with('succes_message','Item was removed from your cart!');
       
    }

    /**
     * Switch item for shoping cart toSave for later
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::findOrFail($id);
        

        $saveitem = new SaveForLater;
        $saveitem->id = $item->id;
        $saveitem->product_name = $item->product_name;
        $saveitem->product_price = $item->product_price;
        $saveitem->save();
       
        $item->delete();

        return redirect()->route('cart.index')->with('succes_message','Item has been saved!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Order;

class CheckoutController extends Controller
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
        
        $products = Cart::all();
        
        //Cart model methods
        $incart = $this->cart->inCart();
        
        $totalPrice = $this->cart->totalPrice();
       

        return view('checkout')->with([
            'incart' => $incart,
            'products' => $products,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $products = Cart::all();

        //take only product_names with is in your cart
        foreach($products as $value)
                $names[] = $value->product_name;
                
        //make string
        $orders = implode(", ",$names);

        $totalPrice = $this->cart->totalPrice();

        //create new order 
        $order = new Order;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->province = $request->province;
        $order->postalcode = $request->postalcode;
        $order->phone = $request->phone;
        $order->name_on_card = $request->name_on_card;
        $order->orders = $orders;
        $order->totalprice = $totalPrice;
        
        $order->save();

        //delete product from cart 
        Cart::truncate();

        return view('thankyou')->with('success_message','Thank you for buying in our store!');
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
        //
    }
}

<?php

namespace App\Http\Controllers;
use App\SaveForLater;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
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
        $mightAlsoLike = Product::MightAlsoLike()->get();
        $products = Cart::all();
        
        $incart = $this->cart->inCart();
        $inSaved = $this->saved->inSaved();
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
        //default value for quantity is 1
        

        $this->cart->id = $request->id;
        $this->cart->product_name = $request->name;
        $this->cart->product_price = $request->price;
        $this->cart->qty = 1;
        $this->cart->image = $request->image;

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
        
        // $validator = Validator::make($request->all() ,[
        //     'quantity' => 'required',
        // ]);   

        // if($validator->fails()) {
        //     session()->flash('error_message','Quantity must be between 1 and 5.');
        //     return response()->json(['succes' => false]);
        // }
        
        $product = Product::findOrFail($id);
        
        Cart::where('id',$id)->update([
            'qty' => $request->quantity,
            'product_price' => ($product->price *  $request->quantity)
        ]);
        
        session()->flash('success_message', 'Quantity was updated succesfully!');
        return response()->json(['succes' => true]);
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
    public function switchToSaveForLater($product_id,$user_id)
    {
        $item = Cart::findOrFail($product_id);
        

        $saveitem = new SaveForLater;
        
        $saveitem->id = $item->id;
        $saveitem->user_id = $user_id;
        $saveitem->product_name = $item->product_name;
        $saveitem->product_price = $item->product_price;
        $saveitem->image = $item->image;
        $saveitem->save();
       
        $item->delete();

        return redirect()->route('cart.index')->with('succes_message','Item has been saved!');
        
    }
}

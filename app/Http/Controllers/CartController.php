<?php

namespace App\Http\Controllers;
use App\SaveForLater;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::MightAlsoLike()->get();
        $products = Cart::all();
        
        $incart = $products->count();
        $totalPrice = 0;

        //take only product_price
        foreach($products as $value)
                $prices[] = $value->product_price;
                
        // count total price
        if(isset($prices)){
            
            foreach($prices as $value)
                $totalPrice += $value;
        }
        
        
        //formating total price
        $totalPrice = '$'.number_format($totalPrice / 100, 2);

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
        $addTocart = new Cart;
        $addTocart->id = $request->id;
        $addTocart->product_name = $request->name;
        $addTocart->product_price = $request->price;
        
        $addTocart->save();

        $products = Cart::all();
        $incart = $products->count();

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

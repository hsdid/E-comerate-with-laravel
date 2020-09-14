<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\SaveForLater;
use App\Cart;
use Auth;

class SaveForLaterController extends Controller
{
    
    public $saved;
    public $cart;

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
        $current_user_id = Auth::id();
        $products = SaveForLater::where('user_id',$current_user_id)->get();
        $inSaved = $this->saved->inSaved();
        $incart = $this->cart->inCart();

        return view('SavedForLater')->with([
            'products' => $products,
            'inSaved' => $inSaved,
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
        //
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
        $product = SaveForLater::findOrFail($id);
        $product->delete();


        return redirect()->route('saved.index')->with('succes_message','Item has been saved!');
      
    }
}

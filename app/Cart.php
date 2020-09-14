<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['id','product_name','product_image','product_price'];

    public function presentPrice(){

        return '$'.number_format($this->product_price / 100, 2);  
    }
    public function inCart() {
        
        $products = Cart::all();
        $incart = $products->count();
       
        return $incart;
    }
    public function totalPrice(){
        
        $products = Cart::all();

        $totalPrice = 0;

        foreach($products as $value) {
            $prices[] = $value->product_price;
        }
        if(isset($prices)){
            foreach($prices as $value)
                $totalPrice += $value;
        }

        return '$'.number_format($totalPrice / 100, 2);
    }
}




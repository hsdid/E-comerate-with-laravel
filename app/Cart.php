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
}

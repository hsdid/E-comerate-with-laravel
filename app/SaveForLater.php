<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveForLater extends Model
{
    protected $table = 'saveforlater';
    protected $fillable = ['id','product_name','product_price'];

    public function inSaved(){
        
        $products = SaveForLater::all();
        $inSaved = $products->count();
        
        return $inSaved;
    }
    
    public function presentPrice(){

        return '$'.number_format($this->product_price / 100, 2);  
    }

}

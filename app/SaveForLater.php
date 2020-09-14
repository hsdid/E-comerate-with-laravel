<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class SaveForLater extends Model
{
    protected $table = 'saveforlater';
    protected $fillable = ['id','product_name','product_price'];

    public function inSaved(){
        
        $current_user_id = Auth::id();
        $products = SaveForLater::where('user_id',$current_user_id)->get();
        $inSaved = $products->count();

        
        return $inSaved;
    }
    
    public function presentPrice(){

        return '$'.number_format($this->product_price / 100, 2);  
    }

}

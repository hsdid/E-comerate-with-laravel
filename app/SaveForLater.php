<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveForLater extends Model
{
    protected $table = 'saveforlater';
    protected $fillable = ['id','product_name','product_price'];
}

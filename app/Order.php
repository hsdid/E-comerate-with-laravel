<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['name','address','city','province','postalcode','phone','name_on_card','orders','totalprice'];
}

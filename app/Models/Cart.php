<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id','product_id','qty','status'];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

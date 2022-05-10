<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class discounts extends Model
{
    use HasFactory;
    // protected $table ="discounts";
    protected $guarded = ['id'];


    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }
}

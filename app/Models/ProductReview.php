<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'rate',
        'content',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function response()
    {
        return $this->hasMany('App\Models\Respon', 'user_id', 'id');
    }
}

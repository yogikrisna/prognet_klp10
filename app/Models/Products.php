<?php

namespace App\Models;

use App\Models\ProductCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(ProductCategoriesDetails::class);
    }

    public function image()
    {
        return $this->hasOne(ProductImages::class, 'product_id');
    }
}

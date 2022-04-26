<?php

namespace App\Models;
use App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table ="product_categories";

    protected $guarded = ['id'];

    public function product_category_details()
    {
        return $this->hasMany('App\Models\ProductCategoryDetail');
    }
}

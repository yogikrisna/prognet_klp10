<?php

namespace App\Models;

use App\Models\ProductCategories;
use App\Models\discounts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table ="products";
    protected $guarded = ['id'];

    public function discounts()
    {
        return $this->hasMany(discounts::class);
    }
    public function product_category_details()
    {
        return $this->hasMany('App\Models\ProductCategoryDetail');
    }

    public function product_images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }
    public function product_review()
    {
        return $this->hasMany('App\Models\ProductReview');
    }
}

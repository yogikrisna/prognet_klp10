<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryDetail extends Model
{
    use HasFactory;

    protected $table ="product_categories_details";
    protected $guarded = ['id'];
    protected $fillable =[
        'category_id',
        'product_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

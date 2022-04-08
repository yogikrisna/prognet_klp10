<?php

namespace App\Models;
use App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function details()
    {
        return $this->hasMany(ProductCategoriesDetails::class);
    }
}

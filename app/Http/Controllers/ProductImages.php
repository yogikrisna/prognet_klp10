<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductImages extends Controller
{
    //
    public function store($id,Request $request)
    {
        $validateData = $request->validate([
            'image' => 'required',
        ]);

        $product = Product::find($id);

        $fotoBuku = $product->product_name . '-'. date('dmY') . '.' .$request->image->extension(); 
        $request->image->move(public_path('storage'), $fotoBuku);


        ProductImage::create([
            'product_id'=> $id,
            'image_name' => $fotoBuku,
        ]);

        return redirect()->back()->with('success', 'new post has been added!');
    }

    public function destroy($id)
    {
        $kategori = ProductImage::find($id); 
        $kategori->delete();
        // return ProductCategoriesDetails::destroy($kategori->id);

        return redirect()->back()->with('success', 'Post has been deleted!');
    }

}

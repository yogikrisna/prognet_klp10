<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategory extends Controller
{
    //
    public function store($id, Request $request)
    {
        $validateData = $request->validate([
            'category' => 'required',
        ]);
        
        ProductCategoryDetail::create([
            'product_id'=> $id,
            'category_id'=> $request->category,
        ]);

        return redirect()->back()->with('success', 'new post has been added!');
    }

    public function destroy($id)
    {
        $kategori = ProductCategoryDetail::find($id); 
        $kategori->delete();
        // return ProductCategoriesDetails::destroy($kategori->id);

        return redirect()->back()->with('success', 'Post has been deleted!');
    }
}

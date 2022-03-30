<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Models\ProductCategoriesDetails;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Str;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products', [
            "title" => "All Posts",
            // "posts" => Post::all()
            "active" => "Posts",
            "details" => ProductCategoriesDetails::get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'title' => 'Created',
            'categories' => ProductCategories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_name' => 'required|max:100',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'description' => 'required'
        ]);

        $fotoBuku = $request->product_name . '-'. date('dmY') . '.' .$request->image->extension(); 
        $request->image->move(public_path('image-buku'), $fotoBuku);


        $products = Products::create($validateData);

        ProductImages::create([
            'product_id'=> $products->id,
            'image_name' => $fotoBuku,
        ]);
        
        $lastIdProduct = $products->id;

        $validateDetails = ([
            'product_id' => $lastIdProduct, 
            'category_id' => $request->input('category_id')
        ]);

        ProductCategoriesDetails::create($validateDetails);

        return redirect('/admin/products')->with('success', 'new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product', [
            'title' => 'product',
            'detail' => ProductCategoriesDetails::findOrFail($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('admin.edit', [
            'product' => $product,
            'title' => 'Edit Product',
            'categories' => ProductCategories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($request->category_id);
        $rules = [
            'product_name' => 'required|max:100',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'description' => 'required'
        ];

        $prod_id = $request->product_id;

        $validateData = $request->validate($rules);

        Products::where('id', $prod_id)->update($validateData);

        $validateDetails = ([
            'category_id' => $request->category_id
        ]);

        ProductCategoriesDetails::where('product_id', '=', $prod_id)->update($validateDetails);

        return redirect('/admin/products')->with('success', 'Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail = ProductCategoriesDetails::find($id); 
        $detail->delete();
        // return ProductCategoriesDetails::destroy($detail->id);

        return redirect('/admin/products')->with('success', 'Post has been deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\ProductCategoriesDetails;
use App\Models\ProductImages;
use App\Models\Products;
use Illuminate\Support\Str;

class DashboardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kategoris=ProductCategories::all();
        // return view ('kategori.index', compact('kategoris')) ->name('kategori');

        return view('kategori.index', [
            "title" => "All Posts",
            // "posts" => Post::all()
            "active" => "Posts",
            "kategoris" => ProductCategories::get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create', [
            'title' => 'Created',
        ]);
    }

    public function show($id)
    {
        return view('kategori.show', [
            'title' => 'kategori',
            'kategoris' => ProductCategories::findOrFail($id)
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
            'category_name' => 'required|max:100',
        ]);


        $kategori = ProductCategories::create($validateData);

        return redirect('/admin/kategori')->with('success', 'new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = ProductCategories::find($id);
        return view('kategori.edit', [
            'category' => $kategoris,
            'title' => 'Edit Product',
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->category_id);
        $rules = [
            'category_name' => 'required|max:100',
        ];

        $validateData = $request->validate($rules);

        ProductCategories::find($id)->update($validateData);

        return redirect('/admin/kategori')->with('success', 'Update!');
    }

    public function destroy($id)
    {
        $kategori = ProductCategories::find($id); 
        $kategori->delete();
        // return ProductCategoriesDetails::destroy($kategori->id);

        return redirect('/admin/kategori')->with('success', 'Post has been deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductCategoryDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\discounts;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Product::with(['product_images', 'product_category_details'])->get();
        $categori = ProductCategory::get();
        $title = "All Posts";
        $active = "Posts";
        // return $product->product_category_details->id;
        return view('admin.products')->with(compact('title', 'active', 'categori', 'details'));
       

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
            'categories' => ProductCategory::all()
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

        $slug = SlugService::createSlug(products::class, 'slug', $request->product_name);

        $fotoBuku = $request->product_name . '-'. date('dmY') . '.' .$request->image->extension(); 
        $request->image->move(public_path('storage'), $fotoBuku);


        $products = Product::create($validateData);

        ProductImage::create([
            'product_id'=> $products->id,
            'image_name' => $fotoBuku,
        ]);
        
        $lastIdProduct = $products->id;

        $validateDetails = ([
            'product_id' => $lastIdProduct, 
            'category_id' => $request->input('category_id'),
            'slug' =>$slug
            
        ]);

        ProductCategoryDetail::create($validateDetails);
    
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

        $title = 'Product';
        $detail = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $data = discounts::join('products', 'products.id', '=', 'discounts.product_id')
        ->where('product_id', $id)
       ->get(['discounts.*']);
        return view('admin.product')->with(compact('title', 'detail', 'categories', 'data'));
            

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.edit', [
            'product' => $product,
            'title' => 'Edit Product',
            'categories' => ProductCategory::all()
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

        Product::where('id', $prod_id)->update($validateData);

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
        $detail = Product::find($id); 
        $detail->delete();
        // return ProductCategoriesDetails::destroy($detail->id);

        return redirect('/admin/products')->with('success', 'Post has been deleted!');
    }
    public function discount($slug)
    {
        return view('admin.discount.add')->with('product', Product::where('slug', $slug)->first());
    }

    public function createDiscount(Request $request, $slug)
    {
        $this->validate($request, [
            'percentage' => 'required|numeric',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:start'
        ]);

        $product = Product::where('slug', $slug)->first();

        $discount = new discounts;
        $discount->products_id = $product->id;
        $discount->percentage = $request->percentage;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();

        return redirect()->action('App\Http\Controllers\ProductsController@show', [$product->slug])->with('message', 'Discount added successfully');
    }

    public function editDiscount($slug)
    {
        return view('admin.discount.edit')->with('product', Product::where('slug', $slug)->first());
    }

    public function updateDiscount(Request $request, $slug)
    {
        $this->validate($request, [
            'percentage' => 'required|numeric',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:start'
        ]);
        $product = Product::where('slug', $slug)->first();
        $id = $product->id;
        discounts::where('id', $id)
            ->update([
                'percentage' => $request->input('percentage'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
            ]);
        return redirect('/product')->with('message', 'Discount updated successfully');
    }

    public function deleteDiscount($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $id = $product->id;
        $discount = discounts::find($id);
        if ($discount != null) {
            $discount->delete();
            return redirect()->back()->with('message', 'Discount deleted successfully');
        }
        return redirect()->back()->with('message', 'Wrong ID!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryDetail;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard() {
        // $data = array('title' => 'Dashboard');
        return view('admin.dashboard', [
            "title" => "All Products",
            // "posts" => Post::all()
            "active" => "Posts",
            "details" => ProductCategoryDetail::get()
        ]);
    }

    // public function products() {
    //     return view('admin.products', [
    //         "title" => "All Posts",
    //         // "posts" => Post::all()
    //         "active" => "Posts",
    //         "products" => Products::all()
    //     ]);
    // }

    // public function index()
    // {

    //     return view('products', [
    //         "title" => "All Posts",
    //         // "posts" => Post::all()
    //         "active" => "Posts",
    //         "posts" => Products::latest()->filter(request(['search', 'category']))->get()
    //     ]);
    // }
}

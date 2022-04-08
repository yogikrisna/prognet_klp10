<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoriesDetails;
use Illuminate\Http\Request;
use App\Models\Products;

class DashboardController extends Controller
{
    public function dashboard() {
        // $data = array('title' => 'Dashboard');
        return view('admin.dashboard', [
            "title" => "All Products",
            // "posts" => Post::all()
            "active" => "Posts",
            "details" => ProductCategoriesDetails::get()
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

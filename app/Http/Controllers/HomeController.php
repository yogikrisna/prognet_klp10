<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $categories = 
        // $produk = Product::all();
        $data = array('title' => 'Home');
        $datas= Product::all();
        // $datas =DB::Table('products')->join('product_images','products.id','=','product_images.product_id')
        // ->select('products.*','product_images.image_name');
      
        return view('homepage.index')->with(compact('data', 'datas'));
    }

    public function detailProduct($id){
        $data = Product::find($id);
        $gambar_product = DB::Table('product_images')->where('product_id',$id)->first();
        return view('homepage.product',compact('data','gambar_product'));
    }
}

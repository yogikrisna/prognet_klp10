<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.cart.transaksi-cart');
    }

    public function addcart($id, Request $request){
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['product_id','=',$id]])->get();
        $product = Product::find($id);

         if(count($carts)==0 ){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $id; 
            $cart->qty =1;
            $cart->status = "notyet";
            $cart->save();  }
      
        else{  
            foreach($carts as $cart){
                $temp = new Cart;
                $temp = Cart::where('id','=',$cart->id)->increment('qty', 1);
            }  
        }
        return redirect('/users/cart');
  
    }


    public function detailcart(){
        
        $products = Product::get();
        $datacart = Cart::where('user_id', auth()->user()->id)->get();
        $carts=Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $subtotal=0;
        foreach($carts as $dd){
            $subtotal=$subtotal+($dd->product->price*$dd->qty);
           }
        $categories = ProductCategory::all();
  
       
    return view('transaksi.cart.transaksi-cart',compact('products','datacart','subtotal', 'categories', 'carts'));
    //    return $cart;
    }

  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $Cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $Cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $Cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $Cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('product_id', '=', $id)->delete();
        return redirect('/users/cart')->with('status', 'Product berhasil dihapus!');
    }
}

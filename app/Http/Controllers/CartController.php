<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

    public function addcart($id){
        $user = Auth::user();
        $carts = Cart::where([['user_id', '=', $user->id],['product_id','=',$id]])->get();
        $product = Product::find($id);
        if(count($carts)==0){
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $id; 
            $cart->qty = 1;
            $cart->status = "notyet";
            $cart->save();  
        }else{  
            foreach($carts as $cart){
                $temp = new Cart;
                $temp = Cart::where('id','=',$cart->id)->increment('qty', 1);
            }  
        }
        return back();
    }


    public function detailcart(){
        
        $products = Product::get();
        $datacart = Cart::where('user_id', auth()->user()->id)->get();
        $carts=Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $total_price = 0;
        $categories = ProductCategory::all();
  
       
    return view('transaksi.cart.transaksi-cart',compact('products','datacart', 'total_price', 'categories', 'carts'));
    //    return $cart;
    }

    public function updatedetailcart($id, Request $request){
        $iduser = auth()->user()->id;
        $qty = $request->qty;
        $update = Cart::where([
            'user_id' => $iduser,
            'id' => $id
        ])->update([
            'qty' => $qty
        ]);
        if($update > 0){
            $total = $this->gettotalprice();
            return response()->json(['success' => $total]);
        }else{
            return response()->json('failed');
        }
    }

    protected function gettotalprice(){
        $Product = Product::get();
        $Cart = Cart::where('user_id',auth()->user()->id)->get();
        $total_price = 0;
        // foreach($Cart as $cart){
        //     foreach($Product as $product){
        //         $discount = $product->discounts;
        //         $price = $product->price;
        //         $discount_price = HomeController::diskon($discount, $price);
        //         if($product->id === $cart->product_id){
        //             if ($discount_price != 0){
        //                 $total_price += ($discount_price * $cart->qty);
        //             }
        //             else{
        //                 $total_price += ($product->price * $cart->qty);
        //             }
        //         }
        //     }
        // }
        return $total_price;
    }

    protected function getupdatedcart(){

        $Product = Product::all();
        // $Cart = Cart::where('user_id', auth()->user()->id);
        $Cart=Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $count = count(array($Cart));
        $total_price = $this->gettotalprice();
        
        return view('user.cart.cart', compact('Product','Cart','count','total_price'));
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
    public function destroy(Cart $Cart)
    {
        //
    }
}

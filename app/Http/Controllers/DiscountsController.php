<?php

namespace App\Http\Controllers;

use App\Models\discounts;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount=discounts::with('Product')->paginate('15');
        
        return view('discount.index',compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::all();
        return view('discount.index',compact('product','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([    
            'percentage' => ['required', 'between:0,99.99'],
            'start' => ['required'],
            'end' => ['required']
        ]);

        $discount = new discounts();
        $discount->id_product = $request->id_product;
        $discount->percentage = $request->percentage;
        $discount->start = $request->start;
        $discount->end = $request->end;
        
        if($discount->save()){
            return redirect()->intended(route('product.edit',['id'=> $request->id_product]))->with("success", "Successfully Add Discount");
        }
        return redirect()->back()->withInput($request->only('percentage', 'start', 'end'))->with("error", "Failed Add Discount");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(discount $discount)
    {
        $product = Product::all();
        return view('discount.editdiscount',compact('discount','product'));
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
        $request->validate([
            'id_product' => ['required'],
            'percentage' => ['required', 'between:0,99.99'],
            'start' => ['required'],
            'end' => ['required']
        ]);
        $discount = discounts::find($id);
        $discount->id_product = $request->id_product;
        $discount->percentage = $request->percentage;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->save();
        return redirect()->route('product.edit', $request->id_product);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = discounts::find($id);
        $discount->delete();
        return redirect()->back()->with("success", "Successfully Delete Discount");
    }
}
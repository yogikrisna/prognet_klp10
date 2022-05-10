<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaksi;

use Auth;

class Checkout extends Component
{
    public $provinces;
    public $regions=[];
    public $input_provinsi;
    public $input_region;
    public $test;
    public $cart;
    public $subtotal;
    public function render()
    {
        $this->provinces=Province::all();
        if(!is_null($this->input_provinsi)){
            $this->regions=City::where('province_id', '=',$this->input_provinsi)->get();
        }
       $this->cart=Cart::with('product')->where('user_id', '=', Auth::user()->id)->get();
       foreach($this->cart as $dd){
        $this->subtotal=$this->subtotal+($dd->product->price*$dd->qty);
       }
        return view('livewire.checkout');
    }
}

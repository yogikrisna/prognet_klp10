<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaksi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;


class Checkout extends Component
{
    public $provinces=[];
    public $regions=[];
    public $input_provinsi;
    public $input_region;
    public $kurir=[];
    public $input_kurir;
    public $test;
    public $cart=[];
    public $shipping_cost=[];
    public $subtotal, $total_weight, $description, $cost_value, $temp_courier;
    public $etd="0";
    public $temp_ongkir;
    public function render()
    {
        $url = 'https://api.rajaongkir.com/starter/cost';
        $client = new Client();
        $this->total_weight=0;
        $this->cart=Cart::with('product')->where([['user_id', '=', Auth::user()->id],['status','=', 'notyet']])->get();


        $this->provinces=Province::all();
        $this->kurir=Courier::all();
        if(!is_null($this->input_provinsi)){
            $temp_provinsi = Province::where('tittle','=',$this->input_provinsi)->first();
            $this->regions=City::where('province_id', '=',$temp_provinsi->province_id)->get();
                if(!is_null($this->input_kurir) && !is_null($this->input_region)){
                    $this->total_weight=0;
                    $temp_city = City::where('tittle','=',$this->input_region)->first();
                    foreach($this->cart as $dd){
                     $this->subtotal=$this->subtotal+($dd->product->price*$dd->qty);
                     $this->total_weight=$this->total_weight+$dd->product->weight*$dd->qty;
                    }
                    $temp_courier = Courier::find($this->input_kurir);
                    $getCost = $client->request('POST', $url, 
                    [
                        'headers' => [
                            'key' => 'c4267eb2dc0020aee5262bc61cdb044b',
                            'Content-Type' => 'application/x-www-form-urlencoded',
                        ],
                        'form_params' => [
                            'origin' => 114,
                            'destination' => $temp_city->city_id,
                            'weight' => $this->total_weight,
                            'courier' => strtolower($temp_courier->courier),
                        ]
                    ]);
                    $cost= json_decode($getCost->getBody(), true);
                    $this->shipping_cost = $cost['rajaongkir']['results'][0]['costs'];
                    $cek =0;
                    foreach($this->shipping_cost as $row){
                        if($cek==0){
                            $this->description = $row['description'];
                            $this->cost_value = $row['cost'][0]['value'];
                            $this->etd = $row['cost'][0]['etd'];
                        }
                    }
                
                
            }
        }


        return view('livewire.checkout');
    }
}
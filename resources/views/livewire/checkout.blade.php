<?php

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
	$temp_shipping=0;
?>

<form method="POST" action={{ route('checkout.confirm') }} enctype="multipart/form-data">
    @csrf
<div class="row">
    <div class="col-12">
        <!-- Checkout Form s-->
        <div class="checkout-form">
            <div class="row row-40">
                <div class="col-12">
                    <h1 class="quick-title">Checkout</h1>
                </div>
                    <div class="col-lg-7 mb--20">
                        <!-- Billing Address -->
                        <div id="billing-form" class="mb-40">
                            <h4 class="checkout-title">Billing Address</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb--20">
                                    <label>First Name </label>
                                    <input type="text"  placeholder="First Name" wire:model='test'>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Last Name*</label>
                                    <input type="text" placeholder="Last Name" value="">
                                </div>
                                <div class="col-12 col-12 mb--20">
                                    <label>Country*</label>
                                    <select  class="nice-select" id="kategori" readonly>
                                        <option value="">Indonesia</option>
                                    </select>
                                </div>
                                <div class="col-12 mb--20">
                                    <label>Address*</label>
                                    <input type="text" name="address" placeholder="Address line 1" id="alamat" value="">
                                    
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Province*</label>
                                    <select class="nice-select" name="province" id="kategori" wire:model='input_provinsi'>
                                        <option value="">Pilih Provinsi </option>
                                        @foreach($provinces as $dd)
                                        <option value="{{$dd->tittle}}" >{{$dd->tittle}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Regioncy</label>
                                    <select class="nice-select" name="regency" id="kategori" wire:model='input_region'>
                                        @if(is_null($input_provinsi))
                                        <option value="">Pilih Provinsi Terlebih Dahulu </option>
                                        @else
                                        <option value="">Pilih Region </option>
                                        @foreach($regions as $dd)
                                        <option value="{{$dd->tittle}}" >{{$dd->tittle}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <label>Zip Code*</label>
                                    <input type="text" name= "postal_code" placeholder="Zip Code" value="">
                                </div>
                                <div class="col-12 col-12 mb--20">
                                    <label>Kurir*</label>
                                    <select class="nice-select" name="courier_id" id="kategori" wire:model='input_kurir'>
                                        <option value="">Pilih Kurir </option>
                                        @foreach($kurir as $dd)
                                        <option value="{{$dd->id}}" >{{$dd->courier}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Shipping Cost</label>
                                    <input type="number" class="form-control"
                                        value="{{$cost_value}}" name="shipping_cost" id="shipping_cost" placeholder="" hidden>
                                    <input type="text" class="form-control"
                                        value="{{rupiah($cost_value)}}" placeholder="">
                                     <?php $temp_ongkir=$cost_value ?> 
                                    {{-- @error('shipping_cost')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <div class="order-note-block mt--30">
                            <label for="order-note">Order notes</label>
                            <textarea id="order-note" cols="30" rows="10" class="order-note" name="order_note" 
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row">
                            <!-- Cart Total -->
                            <div class="col-12">
                                <div class="checkout-cart-total">
                                    <h2 class="checkout-title">YOUR ORDER</h2>
                                    <h4>Product <span>Total</span></h4>
                                    <ul>
                                        @foreach($cart as $dd)
                                        <li><span class="left">{{$dd->product->product_name}} X {{$dd->qty}} </span> <span
                                                class="right">{{$dd->product->price* $dd->qty}} </span></li>
                                        @endforeach
                                    </ul>
                                    <p >Sub Total <span>{{rupiah($subtotal)}}</span></p>
                                    <p >Shipping Fee <span>{{rupiah($cost_value)}}</span></p>
                                    <h4>Grand Total <span>{{rupiah($subtotal+$cost_value)}}</span></h4>
                                    <div class="method-notice mt--25">
                                        <article>
                                            <h3 class="d-none sr-only">blog-article</h3>
                                            Sorry, it seems that there are no available payment methods for
                                            your state. Please contact us if you
                                            require
                                            assistance
                                            or wish to make alternate arrangements.
                                        </article>
                                    </div>
                                    <div class="term-block">
                                        <input type="checkbox" id="accept_terms2">
                                        <label for="accept_terms2">I’ve read and accept the terms &
                                            conditions</label>
                                    </div>
                                    <button type="submit" class="place-order w-100">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
	$temp_shipping=0;
?>
@extends('layouts.main')


@section('content')

<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<!-- Cart Page Start -->
<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Shopping Cart</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="#" class="">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-remove"></th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-subtotal">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    @foreach ($carts as $detail)
                                    <tr>
                                        <td class="pro-remove"><a href="/users/cart/{{$detail->product_id}}"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <td class="pro-title">{{ $detail->product->product_name }}</td>
                                        <td class="pro-price"><span>{{rupiah($detail->product->price) }}</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty"> 
                                                 <div class="count-input-block">
                                                    <input type="number" name="qty" class="form-control text-center"
                                                        >
                                                </div> 
                                             </div> 
                                        </td>
                                        <td class="pro-subtotal"><span>{{ rupiah($detail->product->price*$detail->qty) }}</span></td>
                                        <td class="pro-subtotal"><span>{{$detail->status}}</span></td>
                                    </tr>
                                    @endforeach
                                    <!-- Discount Row  -->
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <div class="coupon-block">
                                                <div class="coupon-text">
                                                    <label for="coupon_code">Coupon:</label>     
                                                </div>
                                            </div>
                                        </td>
                                       
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <!-- Cart Summary -->
                <div class="col-lg-6 col-12 d-flex">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            <p>Sub Total <span class="text-primary">{{ rupiah($subtotal)}}</span></p>
                            <p>Diskon <span class="text-primary">{{ rupiah($subtotal)}}</span></p>
                            <h2>Grand Total <span class="text-primary">{{ rupiah($subtotal)}}</span></h2>
                        </div>
                        <div class="cart-summary-button">
                            <a href="/users/checkout" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <button class="update-btn c-btn btn-outlined">Update Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Cart Page End -->
</div>
@endsection
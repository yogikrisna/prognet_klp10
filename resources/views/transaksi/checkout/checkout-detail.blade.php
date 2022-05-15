<?php

function rupiah ($angka) {
  $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
  return $hasil;
}
  $temp_shipping=0;
?>
@extends('layouts.main')

@section('content')

<div class="container mt-5" style="margin-bottom:100px">
    <div class="row">
            <div class="row">
                <div class="col-6">
                    @if($transaksi->proof_of_payment == null)
                    <div class="section-content">
                        
                        <input type="text" id="temp_timeout" hidden>
                    </div>
                    <div class="card-countdown-time m-t-40 m-b-30" style=" display:flex; align-items:center; justify-content:center;width:100%; margin-top:20px;">
                        <div class="wrapper" style="user-select:none; width:100%;">
                        <div class="time" style="width:100%; display:flex; align-items:center; justify-content:center; border:1px solid #E2E2E2; padding: 20px; height:200px; border-radius:6px; box-shadow:10px 10px 20px rgba(0,0,0,0.09);">
                          <h5 id="demo" style="text-align:center;font-size:50px; font-weight:500;">Time Countdown</h5>
                        <script>
                          var countDownDate = new Date("{{$transaksi->timeout}}").getTime();
                       
                       // Update the count down every 1 second
                       var x = setInterval(function() {
                       
                         // Get today's date and time
                         var now = new Date().getTime();
                       
                         // Find the distance between now and the count down date
                         var distance = countDownDate - now;
                       
                         // Time calculations for days, hours, minutes and seconds
                         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                         var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                       
                         // Display the result in the element with id="demo"
                         document.getElementById("demo").innerHTML = days + " : " + hours + " : "
                         + minutes + " : " + seconds + " : ";
                       
                         // If the count down is finished, write some text
                         if (distance < 0) {
                           clearInterval(x);
                           document.getElementById("demo").innerHTML = "EXPIRED";
                         }
                       }, 1000);
                       </script>  
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="section-content">
                        <h5 class="section-content__title">Time Countdown</h5>
                        <input type="text" id="temp_timeout" hidden>
                    </div>
                    <div class="card-countdown-time m-t-40 m-b-30" style=" display:flex; align-items:center; justify-content:center;width:100%; margin-top:20px;">
                        <div class="wrapper" style="user-select:none; width:100%;">
                            <img src="{{ URL::asset('assets/images/'.$transaksi->proof_of_payment)}}" style="width:400px; height:auto" alt="">
                        </div>
                    </div>
                    @endif
                </div>
    
                <div class="col-6">
                    <div class="checkout-cart-total">
                        <h2 class="checkout-title">YOUR ORDER</h2>
                        <h4>Product <span>Total</span></h4>
                        <ul style="list-style:none;">
                            @foreach($transaksi->transaction_details as $dd)
                            <li><span class="left">{{$dd->product->product_name}} X {{$dd->qty}} </span> <span
                                    class="right">{{$dd->product->price* $dd->qty}} </span></li>
                            @endforeach
                        </ul>
                        <p>Sub Total <span>{{rupiah($transaksi->sub_total)}}</span></p>
                        <p>Shipping Fee <span>{{rupiah($transaksi->shipping_cost)}}</span></p>
                        <h4>Grand Total <span>{{rupiah($transaksi->total)}}</span></h4>
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
                        
                        @if($transaksi->proof_of_payment == null)
                            <form action="{{route('upload.pembayaran', $transaksi->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="file" name="gambar" id="gambar" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="place-order w-100">Upload Bukti Pembayaran</button>
                                </div>
                            </form>
                        @else
                        <button type="submit" class="place-order w-100">Anda telah melakukan upload bukti pembayaran</button>
                        @endif                
                    </div>
                </div>
            </div>
            <hr style="margin-top:50px">
            @if($transaksi->proof_of_payment != NULL && $transaksi->is_review == 0)
            <div class="row" style="margin-top:50px;">
                <div class="section-content">
                    <h2 class="section-content__title text-center">Reviews</h2>
                </div>
                <form action="{{route('upload.review.user', $transaksi->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-countdown-time m-t-40 m-b-30" style=" display:flex; align-items:center; justify-content:center;width:100%; margin-top:20px;">
                        <div class="wrapper" style="user-select:none; width:100%;">
                          {{-- {{dd($transaksi)}} --}}
                            @foreach($transaksi->transaction_details as $dd)
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row" style="display: flex; align-items:center;justify-content:center;">
                                            <div class="col-4">
                                                <img src="{{ URL::asset('assets/images/.$transaksi->proof_of_payment')}}" style="width:100%; height:100px; border-radius:10%" alt="">
                                            </div>
                                            <div class="col-8">
                                                <p style="font-size: 18px; font-weight: 500;">{{$dd->product->product_name}}</p>
                                                <p style="font-size: 16px; font-weight: normal;">{{rupiah($dd->product->price)}}</p>
                                                <div class="star-widget">
                                                    <input type="radio" name="rate[]" value="5" id="rate-5">
                                                    <label for="rate-5" class="fas fa-star"></label>
                                                    <input type="radio" name="rate[]" value="4" id="rate-4">
                                                    <label for="rate-4" class="fas fa-star"></label>
                                                    <input type="radio" value="3" name="rate[]" id="rate-3">
                                                    <label for="rate-3" class="fas fa-star"></label>
                                                    <input type="radio" value="2" name="rate[]" id="rate-2">
                                                    <label for="rate-2" class="fas fa-star"></label>
                                                    <input type="radio" value="1" name="rate[]" id="rate-1">
                                                    <label for="rate-1" class="fas fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                      const btn = document.querySelector("button");
                                      const post = document.querySelector(".post");
                                      const widget = document.querySelector(".star-widget");
                                      const editBtn = document.querySelector(".edit");
                                      btn.onclick = ()=>{
                                        widget.style.display = "none";
                                        post.style.display = "block";
                                        editBtn.onclick = ()=>{
                                          widget.style.display = "block";
                                          post.style.display = "none";
                                        }
                                        return false;
                                      }
                                  </script>
                                    <div class="col-6">
                                        <input type="text" name="product_id[]" value="{{$dd->product->id}}" hidden>
                                        <textarea name="content[]" id="" style="width:100%" rows="5"></textarea>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="place-order w-100" style="margin-top:50px;">Upload review</button>
                            
                        </div>
                    </div>
                </form>
            </div>
            <hr style="margin-top:100px;">
            @endif
        </div>                
    </div>
</div>

@endsection
@section('javascript')

@endsection
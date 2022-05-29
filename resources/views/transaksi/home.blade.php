@extends('layouts.main')


@section('content')
<section class="hero-area hero-slider-2">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-12">
                <div class="sb-slick-slider" data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 1,
                                                        "dots":true
                                                        }'>
                    <div class="single-slide bg-image" data-bg="../assets/image/products/bg1.jpg">
                        <div class="home-content pl--30">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span class="title-mid">Book Mockup</span>
                                    <h2 class="h2-v2">Hardcover.</h2>
                                    <p>Cover up front of book and
                                        <br>leave summary</p>
                                    <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide bg-image" data-bg="../assets/image/products/bg1.jpg">
                        <div class="home-content pl--30">
                            <div class="row">
                                <div class="col-lg-7">
                                    <span class="title-mid">Book Mockup</span>
                                    <h2 class="h2-v2">Hardcover.</h2>
                                    <p>Cover up front of book and
                                        <br>leave summary</p>
                                    <a href="shop-grid.html" class="btn btn-outlined--primary">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Home Features Section
===================================== -->
<section class="mb--30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="text">
                        <h5>Free Shipping Item</h5>
                        {{-- <p> Orders over $500</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-redo-alt"></i>
                    </div>
                    <div class="text">
                        <h5>Money Back Guarantee</h5>
                        {{-- <p>100% money back</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                        <i class="fas fa-piggy-bank"></i>
                    </div>
                    <div class="text">
                        <h5>Cash On Delivery</h5>
                        {{-- <p>Lorem ipsum dolor amet</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mt--30">
                <div class="feature-box h-100">
                    <div class="icon">
                         <i class="fas fa-life-ring"></i> 
                    </div>
                    <div class="text">
                        <h5>Help & Support</h5>
                        {{-- <p>Call us : + 0123.4567.89</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Deal of the day 
===================================== -->
<section class="section-margin">
    <div class="container">
        <div class="promo-section-heading">
            @foreach($notif as $item)
            <h2>{{ $item->data }}</h2>
            @endforeach
        </div>
        <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{
        "autoplay": true,
        "autoplaySpeed": 8000,
        "slidesToShow": 4,
        "dots":true
        }' data-slick-responsive='[
            {"breakpoint":1400, "settings": {"slidesToShow": 4} },
            {"breakpoint":992, "settings": {"slidesToShow": 3} },
            {"breakpoint":768, "settings": {"slidesToShow": 2} },
            {"breakpoint":575, "settings": {"slidesToShow": 2} },
            {"breakpoint":490, "settings": {"slidesToShow": 1} }
        ]'>
        @foreach($datas as $barang)
            <div class="single-slide">
                <div class="product-card">
                    <div class="product-header">
                        <a href="/detailcart" class="author">
                           Stock:  {{ $barang->stock }}
                        </a>
                        <h3><a href="product-details.html">{{ $barang->product_name }}
                          </a>
                        </h3>
                    </div>
                    <div class="product-card--body">
                        <div class="card-image">
                            @foreach($barang->product_images as $cc)
                            <img src="/storage/{{$cc->image_name}}" alt="" style="height:400px;">
                            @endforeach
                            <div class="hover-contents">
                                <a href="product-details.html" class="hover-image">
                                    @foreach($barang->product_images as $cc)
                            <img src="/storage/{{$cc->image_name}}" alt="" style="height:400px;">
                            @endforeach
                                </a>
                                <div class="hover-btns">
                                    <a href="{{route('cart.add', $barang->id)}}" class="single-btn">
                                        <i class="fas fa-shopping-basket"></i>
                                    </a>
                                    <a href="{{route('detail-product', $barang->id)}}" 
                                        class="single-btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="price-block">
                            <span class="price">{{ $barang->price }}</span>
                            {{-- <del class="price-old">{{ $barang->price }}</del>
                            <span class="price-discount">0%</span> --}}
                        </div>
                        <div class="star-widget">
                            <div class="rating-block mb--15">
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline star_on"></span>
                                <span class="ion-android-star-outline"></span>
                                <span class="ion-android-star-outline"></span>
                            </div>
                            {{-- <label for="rate-5" class="fas fa-star"></label>
                            <label for="rate-4" class="fas fa-star"></label>
                            <label for="rate-3" class="fas fa-star"></label>
                            <label for="rate-2" class="fas fa-star"></label> --}}
                            {{-- <input type="radio" value="1" name="rate[]" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</section>

@endsection
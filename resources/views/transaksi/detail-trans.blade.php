@extends('layouts.main')


@section('content')
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Checkout Form s-->
                <div class="checkout-form">
                    <div class="row row-40">
                        <div class="col-12">
                            <h1 class="quick-title">Checkout</h1>
                            <!-- Slide Down Trigger  -->
                          
                            <!-- Slide Down Blox ==> Login Box  -->
                        </div>
                        <div class="col-lg-7 mb--20">
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Billing Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
                                    <div class="col-12 col-12 mb--20">
                                        <label>Country*</label>
                                        <select class="nice-select">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>
                                    <div class="col-12 mb--20 ">
                                        <div class="block-border check-bx-wrapper">
                                            <div class="check-box">
                                                <input type="checkbox" id="create_account">
                                                <label for="create_account">Create an Acount?</label>
                                            </div>
                                            <div class="check-box">
                                                <input type="checkbox" id="shiping_address" data-shipping>
                                                <label for="shiping_address">Ship to Different Address</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Shipping Address -->
                            <div id="shipping-form" class="mb--40">
                                <h4 class="checkout-title">Shipping Address</h4>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Country*</label>
                                        <select class="nice-select">
                                            <option>Bangladesh</option>
                                            <option>China</option>
                                            <option>country</option>
                                            <option>India</option>
                                            <option>Japan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                            <div class="order-note-block mt--30">
                                <label for="order-note">Order notes</label>
                                <textarea id="order-note" cols="30" rows="10" class="order-note"
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
                                            <li><span class="left">Cillum dolore tortor nisl X 01</span> <span
                                                    class="right">$25.00</span></li>
                                            <li><span class="left">Auctor gravida pellentesque X 02 </span><span
                                                    class="right">$50.00</span></li>
                                            <li><span class="left">Condimentum posuere consectetur X 01</span>
                                                <span class="right">$29.00</span></li>
                                            <li><span class="left">Habitasse dictumst elementum X 01</span>
                                                <span class="right">$10.00</span></li>
                                        </ul>
                                        <p>Sub Total <span>$104.00</span></p>
                                        <p>Shipping Fee <span>$00.00</span></p>
                                        <h4>Grand Total <span>$104.00</span></h4>
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
                                        <button class="place-order w-100">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
@endsection
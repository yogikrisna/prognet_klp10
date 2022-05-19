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
                                        <tr>
                                      
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    @foreach ($transaksi as $item)
                                    <tr>
                                    <td >{{ $item->user->user_name }}</td>
                                    <td >{{ "Rp" . number_format($item->total, 0, ",", ",") }}</td>
                                    <td >{{ $item->created_at->format('d/m/Y H:m:s') }}</td>
                                    <td class="pro-subtotal"><span>{{$item->status}}</span></td>
                                    <td>
                                    @if ( $item->proof_of_payment == NULL)
                                    <a href="myTransaksi/{{ $item->id }}"
                                    class="badge bg-info nav-link">Bayar </a>
                                    @endif
          

                                    @if ($item->status == 'delivered')
                                    <form action="success/{{$item->id}}" method="POST">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <button type="submit" name="success" class="badge bg-warning nav-link">Diterima
                                            </button>
                                    </form>
                                    @endif
                                    
                                    @if (($item->status == 'success')  && ($item->is_review == 0))
                                    <a href="myTransaksi/{{ $item->id }}"
                                    class="badge bg-info nav-link">Review </a>
                                    @endif

                                    @if (($item->status == 'success')  && ($item->is_review !=NULL))
                                   <p>Pesanan Telah di terima</p>
                                    @endif
                                    @if (($item->status == 'unverified' && $item->proof_of_payment == NULL) || (($item->status == 'unverified') && (isset($item->proof_of_payment))) || ($item->status == 'verified'))
                                            <form action="userCanceled/{{$item->id}}" method="POST">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="canceled" class="badge bg-warning nav-link">Cancel
                                                    </button>
                                            </form>
                                    @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
@endsection
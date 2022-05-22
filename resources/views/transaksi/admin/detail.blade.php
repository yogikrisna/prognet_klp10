
@extends('layouts.dashboard')
@section('css')
<style>
    .dataTables_filter {
        float: right !important;
    }
</style>
@endsection
@section('content')
  <div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Transactions Detail: {{ $id }}</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            @foreach ($transactions as $order)
                <div class="container" style="display: inline-block;">
                    <div class="row justify-content-center align-self-center">
                        <div class="card bg-secondary pt-4 pb-4 pl-5 pr-5 rounded col-xs-12 col-sm-12 col-md-8">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <address>
                                        <strong>Receipt: </strong>
                                        <br>
                                        {{ $order->user->name }}
                                        <br>
                                        {{ $order->address }}
                                        <br>
                                        {{ $order->regency .', '. $order->province }}
                                    </address>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                    <p>
                                        <em>Tanggal : {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</em>
                                    </p>
                                    <p>
                                        <em>Status : {{ ucfirst($order->status) }}</em>
                                    </p>
                                    @if (($order->status == 'unverified') && (is_null($order->proof_of_payment)))
                                        <p>
                                            <em>Transfer ke : {{ substr(str_shuffle("0123456789"), 0, 16) }}</em>
                                        </p>
                                        <p>
                                            <em>Batas Bayar : <em id="countdown"></em></em>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $transaction_detail = \App\Models\TransaksiDetail::with('product')->where('transaction_id', $order->id)->get(); @endphp
                                        @foreach ($transaction_detail as $order_detail)
                                            <tr>
                                                <td class="col-md-9"><em>{{ $order_detail->product->product_name }}</em></h4></td>
                                                <td class="col-md-1 text-center">{{ $order_detail->qty }}</td>
                                                <td class="col-md-1 text-center">{{ "Rp" . number_format($order_detail->selling_price, 0, ",", ",") }}</td>
                                                <td class="col-md-1 text-center">{{ $order_detail->discount }}%</td>
                                                <td class="col-md-1 text-center">{{ "Rp" . number_format(($order_detail->selling_price - ($order_detail->selling_price * $order_detail->discount)/100)*$order_detail->qty, 0, ",", ",") }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            <td class="text-left">
                                                <p>
                                                    <strong>Subtotal: </strong>
                                                </p>
                                                <p>
                                                    <strong>Ongkir: </strong>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    <strong>{{ "Rp" . number_format($order->sub_total, 0, ",", ",") }}</strong>
                                                </p>
                                                <p>
                                                    <strong>{{ "Rp" . number_format($order->shipping_cost, 0, ",", ",") }}</strong>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>   </td>
                                            <td>   </td>
                                            <td>   </td>
                                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                            <td class="text-center text-danger"><h4><strong>{{ "Rp" . number_format($order->total, 0, ",", ",") }}</strong></h4></td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if ($order->status == 'unverified')
                                    @if (is_null($order->proof_of_payment))
                                        <button type="button" class="btn btn-dark btn-lg btn-block">
                                            Belum Upload Bukti Pembayaran   <span class="glyphicon glyphicon-chevron-right"></span>
                                        </button>
                                        <form id="timeout" action="{{ url('expired/'. $order->id) }}" method="POST" hidden>
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-lg btn-block mt-2" hidden>
                                                Expired   <span class="glyphicon glyphicon-chevron-right" hidden></span>
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-warning btn-lg btn-block">
                                            Sedang Menunggu Verifikasi   <span class="glyphicon glyphicon-chevron-right"></span>
                                        </button>
                                    @endif
                                @elseif ($order->status == 'verified')
                                    <button type="button" class="btn btn-info btn-lg btn-block">
                                        Pesanan Verified - Segera Dikirim   <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                @elseif ($order->status == 'delivered') 
                                    <button type="button" class="btn btn-primary btn-lg btn-block">
                                        Pesanan Sedang Dikirim   <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                @elseif ($order->status == 'success')
                                    <button type="button" class="btn btn-success btn-lg btn-block">
                                        Pesanan Sudah Diterima   <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                @elseif ($order->status == 'expired')
                                    <button type="button" class="btn btn-light btn-lg btn-block">
                                        Pesanan Expired   <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                @elseif ($order->status == 'canceled')
                                    <button type="button" class="btn btn-danger btn-lg btn-block">
                                        Pesanan Dibatalkan   <span class="glyphicon glyphicon-chevron-right"></span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group">
                    {{-- TOMBOL APPROVE --}}
                    @if (($order->status == 'unverified') && (isset($order->proof_of_payment)))
                        <form action="/admin/approve/{{ $order->id}}" method="POST">
                            {{  method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" name="approve" class="btn btn-success">Approve
                            </button>
                        </form>
                    @endif
     
                    {{-- TOMBOL KIRIM --}}
                    @if ($order->status == 'verified')
                        <form action="/admin/delivered/{{ $order->id}}" method="POST">
                            {{  method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" name="delivered" class="btn btn-info">Kirim

                            </button>
                        </form>
                    @endif
    
                    {{-- TOMBOL CANCEL --}}
                    @if (($order->status == 'unverified' && $order->proof_of_payment == NULL) || (($order->status == 'unverified') && (isset($order->proof_of_payment))) || ($order->status == 'verified'))
                        <form action="/admin/canceled/{{ $order->id}}" method="POST">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" name="canceled" class="btn btn-danger">Cancel
                            </button>
                        </form>
                    @endif

                
                    @if (($order->status == 'unverified' && $order->proof_of_payment == NULL))
                        <script>
                            CountDownTimer('{{$order->created_at}}', 'countdown', '{{$order->timeout}}')
                            function CountDownTimer(dt, id, timeout)
                            {
                                var end = new Date(timeout);
                                var _second = 1000;
                                var _minute = _second * 60;
                                var _hour = _minute * 60;
                                var _day = _hour * 24;
                                var timer;
                                function showRemaining() {
                                    var now = new Date();
                                    var distance = end - now;
                                    if (distance < 0) {
                                        clearInterval(timer);
                                        document.getElementById(id).innerHTML = 'Expired'
                                        document.getElementById("timeout").submit();
                                        return;
                                    }
                                    var days = Math.floor(distance / _day);
                                    var hours = Math.floor((distance % _day) / _hour);
                                    var minutes = Math.floor((distance % _hour) / _minute);
                                    var seconds = Math.floor((distance % _minute) / _second);
                        
                                    document.getElementById(id).innerHTML = days + ' days ';
                                    document.getElementById(id).innerHTML += hours + ' hrs ';
                                    document.getElementById(id).innerHTML += minutes + ' mins ';
                                    document.getElementById(id).innerHTML += seconds + ' secs';
                                }
                                timer = setInterval(showRemaining, 1000);
                            }
                        </script>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection


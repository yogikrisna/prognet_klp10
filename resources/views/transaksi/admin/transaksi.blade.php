@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>Produk</strong></h4>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive col-lg-auto">
                        <a href="/admin/transactions" class="btn btn-primary my-3"> Create new product</a>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
			                        <th>Name</th>
			                        <th>Amount</th>
			                        <th>Tanggal Pesan</th>
                                    <th>Bukti Pembayaran</th>
			                        <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $item)
                                <tr>
                                    <td><a style="text-decoration: none; color: inherit;" href="{{ route('transactions.detail', ['id' => $item->id]) }}">{{ $item->id }}</a></td>
                                    <td >{{ $item->user->user_name }}</td>
                                    <td >{{ "Rp" . number_format($item->total, 0, ",", ",") }}</td>
                                    <td >{{ $item->created_at->format('d/m/Y H:m:s') }}</td>
                                    <td>
                                        @if (isset($item->proof_of_payment))
                                            <span class="label label-default"><a style="text-decoration: none; color: inherit;" href="{{url('storage/public_html/payment/'.$item->proof_of_payment)}}" target="_blank">Lihat Bukti</a></span>                    
                                        @else 
                                            Tidak ada
                                        @endif
                                    </td>
                                    <td >
                                        @if ($item->status == 'unverified' && $item->proof_of_payment == NULL)
                                            <span class="label label-default">Belum Bayar</span>
                                        @elseif (($item->status == 'unverified') && (isset($item->proof_of_payment)))
                                            <span class="label label-warning">Pending</span>
                                        @elseif ($item->status == 'verified')
                                            <span class="label label-info">Segera Dikirim</span>
                                        @elseif ($item->status == 'delivered')
                                            <span class="label label-primary">Dikirim</span>
                                        @elseif ($item->status == 'success')
                                            <span class="label label-success">Diterima</span>
                                        @elseif ($item->status == 'expired')
                                            <span class="label label-danger">Expired</span>
                                        @elseif ($item->status == 'canceled')
                                            <span class="label label-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>
                                            @if (($item->status == 'unverified') && (isset($item->proof_of_payment)))
                                                <form action="/admin/approve/{{ $item->id }}" method="POST">
                                                    {{  method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="approve" class="badge bg-info nav-link">Approve
                                                    </button>
                                                </form>
                                            @endif
                            
                                            {{-- TOMBOL KIRIM --}}
                                            @if ($item->status == 'verified')
                                                <form action="/admin/delivered/{{ $item->id}}" method="POST">
                                                    {{  method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="delivered" class="badge bg-warning nav-link">Kirim</button>
                                                </form>
                                            @endif
                            
                                            {{-- TOMBOL CANCEL --}}
                                            @if (($item->status == 'unverified' && $item->proof_of_payment == NULL) || (($item->status == 'unverified') && (isset($item->proof_of_payment))))
                                                <form action="/admin/canceled/{{ $item->id}}" method="POST">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="canceled" class="badge bg-warning nav-link">Cancel
                                                    </button>
                                                </form>
                                            @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center" colspan="1">
                                    <p>Tidak ada data</p>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection

@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Produk</strong></h4>
          {{-- <div class="card-tools">
            <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a>
          </div> --}}
        </div>
        <div class="card-body">

          {{-- isi --}}
          <div class="container">
            <div class="row">
                @foreach ( $details as $detail )
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="position-absolute bg-dark px-3 py-2 text-white"> <a class="text-white text-decoration-none" href="/posts?categories={{ $detail->category->category_name }}">{{ $detail->category->category_name }}</a></div>
                        <img src="/image-buku/{{ $detail->product->image->image_name }}" class="card-img-top" alt="">
                        <div class="card-body">
                          <div>
                            <h5>{{ $detail->product->product_name }}</h5>
                          </div>
                          <div>
                                <small>
                                    By <a href="/authors/{{ $detail->product->product_name }}"
                                        class="text-decoration-none">{{ auth()->user()->admin_name }}</a>
                                    {{ $detail->product->created_at->diffForHumans() }}
                                </small>
                            </div>
                            <p class="card-text">{{ $detail->product->excerpt }}</p>
                            <a href="/admin/products/{{ $detail->id }}" class="btn btn-primary">Detail</a>
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- @foreach ( $products as $category )
          <ul>
              <li>
                  <h2>{{ $category->product_name }}</h2>
              </li>
          </ul>
        @endforeach --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
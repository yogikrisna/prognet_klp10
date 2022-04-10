@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>kategori</strong></h4>
          <div class="card-tools">
            {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
          </div>
        </div>
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <article class="my-3">
                        <h2>{{ $kategoris->kategori_name }}</h2>
                        <p>By <a href="/authors/{{ $kategoris->kategori_name }}"
                                class="text-decoration-none">{{ auth()->user()->admin_name }}</a> In Kategory
                            <a class="text-decoration-none"
                                href="/categories/{{ $kategoris->kategori_name }}">{{ $kategoris->category_name }}</a>
                        </p>
                        
                        {!! $kategoris->description !!}
                    </article>
                    <div class="my-3 fs-5">
                        <a href="/admin/dashboard"> Back to Products</a>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
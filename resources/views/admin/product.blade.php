@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Produk</strong></h4>
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
                        <h2>{{ $detail->product_name }}</h2>
                        <p>By <a href="/authors/{{ $detail->product_name }}"
                                class="text-decoration-none">{{ auth()->user()->admin_name }}</a> In Kategory
                            @foreach($categories as $category)
                            @foreach($detail->product_category_details as $dd)
                            @if($dd->category_id == $category->id)
                            <a class="text-decoration-none"
                                href="/categories/{{ $dd->category_id }}">{{$category->category_name}}</a>
                            @endif
                            @endforeach
                            @endforeach
                        </p>
                        @foreach($detail->product_images as $dd)
                        <img src="/storage/{{ $dd->image_name }}" class="img-fluid mt-3 alt="{{ $detail->product_name }} ">
                        @endforeach
                        {!! $detail->description !!}
                    </article>
                    <div class="my-3 fs-5">
                        <a href="/admin/products"> Back to Products</a>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Produk Categories</strong></h4>
          <div class="card-tools">
            {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
          </div>
        </div>
        
        <div class="container-fluid">
          <div class="table-responsive col-lg-auto">
              <a href="#" class="btn btn-primary my-3"> Create New Category Product</a>
              <table class="table table-sm">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($detail->product_category_details as $dd)
                      @foreach($categories as $c)
                      @if($dd->category_id == $c->id)
                      <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->category_name }}</td>
                        <td>
                          <a href="" class="badge bg-info nav-link">Detail</a>
                          <a href="" class="badge bg-warning nav-link">Edit</a>
                              <form action="" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="badge bg-danger nav-link border-0" onclick="return confirm('Yakin Mau Hapus Buku? ')">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Produk Images</strong></h4>
          <div class="card-tools">
            {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
          </div>
        </div>
        
        <div class="container-fluid">
          <div class="table-responsive col-lg-auto">
              <a href="#" class="btn btn-primary my-3"> Create New Image Product</a>
              <table class="table table-sm">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($detail->product_images as $c)
                      <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->image_name}}</td>
                        <td>
                          <a href="" class="badge bg-info nav-link">Detail</a>
                          <a href="" class="badge bg-warning nav-link">Edit</a>
                              <form action="" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="badge bg-danger nav-link border-0" onclick="return confirm('Yakin Mau Hapus Buku? ')">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
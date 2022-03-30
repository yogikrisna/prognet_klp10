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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create new Product</h1>
        </div>
        
        <div class="col-lg-8">
            <form method="post" action="/admin/products" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="product_name" class="form-label">Product Name</label>
                  <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" autofocus value="{{ old('product_name') }}">
                  @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input placeholder="Rp. 10xx" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                  @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="stock" class="form-label">Stock</label>
                  <input placeholder="1xx" type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}">
                  @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="weight" class="form-label">Weight</label>
                  <input placeholder="1xx kg" type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                  @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select" name="category_id">
                      @foreach ($categories as $category)
                      @if (old('category_id') === $category->id)
                        <option value="{{ $category->id }}" selected> {{ $category->category_name }} </option>
                        @else
                        <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                      @endif
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                    <label for="image" name="image" class="form-label">Post Image</label>
                    <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  @error('description')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                  <trix-editor input="description"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Create Post</button>
              </form>
        </div>
        

        </div>

      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
  })
</script>
@endsection
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
            <div class="row">
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
                        <?php $x = 0;?>
                        @foreach($detail->product_images as $dd)
                        @if($x<=0)
                        <img src="/storage/{{ $dd->image_name }}" class="img-fluid mt-3 alt="{{ $detail->product_name }} ">
                        <?php $x=$x+1; ?>
                        @endif
                        @endforeach
                        {!! $detail->description !!}
                    </article>
                    <!--<h1 class="card-title"><strong>Product Discount</strong></h1>
                    <div class="card">
                        <div class="table">
                            <table class="table table-striped table-bordered center">
                                <tbody>
                                @forelse($data as $discount)
                                    <tr>
                                        <th style="width:25%;">Discount Precentage</th>
                                        <td>{{ $discount->percentage }}{{"%"}}</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td>{{ $discount->start }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $discount->end }}</td>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <td>
                                            <a class="btn btn-primary" href="/admin/discount/{{ $discount->id }}/edit" role="button" data-toggle="tooltip" data-placement="bottom" title="Edit Discount" onclick="return confirm('Are you sure you want to edit this discount?')">
                                                <i class="align-middle icon-white" data-feather="edit-2"></i>
                                            </a>
                                            <form action="{{ route('discount.destroy', $discount->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit" data-toggle="tooltip" data-placement="bottom" title="Delete Discount" onclick="return confirm('Are you sure you want to delete this discount?')">
                                                    <i class="align-middle" data-feather="trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        
                                        
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div> -->
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
              <a data-toggle="modal" data-target="#addCategoryProduct"  class="btn btn-primary my-3"> Create New Category Product</a>
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
                              <form action="/admin/categoryproduk/{{$dd->id}}/delete" method="post" class="d-inline">
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
              <a data-toggle="modal" data-target="#addImageProduct" class="btn btn-primary my-3"> Create New Image Product</a>
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
                              <form action="/admin/imageproduk/{{$c->id}}}/delete" method="post" class="d-inline">
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

<!-- Modal -->
<div class="modal fade" id="addImageProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/imageproduk/{{$detail->id}}/create" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">
        
          <div class="col-lg-12 mb-3">
              <label for="gambar">Image</label>
              <input type="file" class="form-control-file" id="gambar" name="image" required>
          </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCategoryProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/categoryproduk/{{$detail->id}}/create" method="POST" enctype="multipart/form-data">
          @csrf
      <div class="modal-body">       
          <div class="col-lg-12 mb-3">
              <label for="gambar">Category</label>
              <input type="text" class="form-control-file" id="gambar" name="category" required>
          </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
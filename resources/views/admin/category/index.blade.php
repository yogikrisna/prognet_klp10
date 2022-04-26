@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>Category</strong></h4>
                    <div class="card-tools">
                        {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive col-lg-auto">
                        <a href="/admin/products/create" class="btn btn-primary my-3"> Create New Category</a>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->category_name }}</td>
                                    <td>{{ $c->created_at}}</td>
                                    <td>
                                        <a href=""
                                            class="badge bg-info nav-link">Detail</a>
                                        <a href=""
                                            class="badge bg-warning nav-link">Edit</a>
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

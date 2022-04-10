@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>Kurir</strong></h4>
                    <div class="card-tools">
                        {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive col-lg-auto">
                        <a href="/admin/kurir/create" class="btn btn-primary my-3"> Create new kurir</a>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kurir Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kurirs as $kurir)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kurir->courier }}</td>
                
                                    <td>
                                        <a href="/admin/kurir/{{ $kurir->id }}"
                                            class="badge bg-info nav-link">Detail</a>
                                        <a href="/admin/kurir/{{ $kurir->id }}/edit"
                                            class="badge bg-warning nav-link">Edit</a>
                                            <form action="/admin/kurir/{{ $kurir->id }}" method="post" class="d-inline">
                                              @method('delete')
                                              @csrf
                                              <button class="badge bg-danger nav-link border-0" onclick="return confirm('Yakin Mau Hapus kurir? ')">Delete</button>
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

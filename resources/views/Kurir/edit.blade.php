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
                        {{-- <a href="/kurir" class="btn btn-sm btn-danger">
                          More
                        </a> --}}
                    </div>
                </div>
                <div class="container-fluid">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Edit new kurir</h1>
                    </div>

                    <div class="col-lg-8">
                        <form method="post" action="/admin/kurir/{{ $kurir->id }}">
                            @method('put')
                            @csrf
                            <input type="hidden" class="form-control" id="kurir_id"
                                    name="kurir_id" autofocus value="{{ $kurir->id }}">
                            <div class="mb-3">
                                <label for="courier" class="form-label">kurir name</label>
                                <input type="text" class="form-control @error('courier') is-invalid @enderror" id="courier"
                                    name="courier" autofocus value="{{ old('courier', $kurir->courier) }}">
                                @error('courier')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary mb-3">Edit Post</button>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })

</script>
@endsection

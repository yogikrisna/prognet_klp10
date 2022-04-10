@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="container-fluid">
                    <div class="col-lg-8">
                        <form method="" action="">
                            <input type="hidden" class="form-control" id="kurir_id"
                                    name="kurir_id" autofocus value="{{ $kurir->id }}"cdisabled>
                            <div class="mb-3">
                                <label for="courier" class="form-label">kurir name</label>
                                <input type="text" class="form-control @error('courier') is-invalid @enderror" id="courier"
                                    name="courier" autofocus value="{{ old('courier', $kurir->courier) }}" disabled>
                                @error('courier')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <a href="/admin/kurir" class="btn btn-primary mb-3">Back</a>
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

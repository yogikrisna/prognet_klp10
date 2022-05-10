@extends('layouts.dashboard')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Add Discount</strong></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form action="/admin/product/{{ $product->slug }}/add-discount" method="POST"  enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="form-group" >
                            <label for="percentage" class="control-label">Percentage(%)</label>
                            <input type="number" name="percentage" class="form-control @error('percentage') is-invalid @enderror" id="percentage(%)" placeholder="percentage" aria-describedby="percentage" aria-invalid="true" value="{{ old('percentage')}}" step="1" min="1" max="100" required pattern="[0-9]+">
                            @error('percentage')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" >
                            <label for="start" class="control-label">Start</label>
                            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" id="start" aria-describedby="start" aria-invalid="true" value="{{ old('start')}}" required>
                            @error('start')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group" >
                            <label for="end" class="control-label">End</label>
                            <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" id="end" aria-describedby="end" aria-invalid="true" value="{{ old('end')}}" required>
                            @error('end')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Submit Discount" onclick="return confirm('Are you sure you want to add this discount?')">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
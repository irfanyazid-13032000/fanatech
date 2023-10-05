@extends('layouts.app')

@section('title', 'Tambah Data Inventory')

@section('content')



    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a class="text-decoration-none text-muted fw-light"
                href="{{ route('sale.index') }}">Data Sale</a> /</span>
        Tambah Sale
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Sale</h5>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inventory_id" class="form-label">Inventory</label>
                            <input type="text" name="inventory_id" class="form-control" id="inventory_id" value="{{ old('inventory_id') }}" required>
                            @error('inventory_id')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="qty" class="form-label">qty</label>
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ old('qty') }}" required>
                            @error('qty')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('inventory.index') }}" class="btn btn-danger ms-3">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




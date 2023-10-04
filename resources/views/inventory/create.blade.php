@extends('layouts.app')

@section('title', 'Tambah Data Inventory')

@section('content')



    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a class="text-decoration-none text-muted fw-light"
                href="{{ route('inventory.index') }}">Data Inventory</a> /</span>
        Tambah Inventory
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Inventory</h5>
                <div class="card-body">
                    <form action="{{route('inventory.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">code</label>
                            <input type="text" name="code" class="form-control" id="code" value="{{ old('code') }}" required>
                            @error('code')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="stock" class="form-label">stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                value="{{ old('stock') }}" required>
                            @error('stock')
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




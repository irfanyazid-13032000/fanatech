@extends('layouts.app')

@section('title', 'Edit Data Anggota user')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a class="text-decoration-none text-muted fw-light"
                href="{{ route('inventory.index') }}">Data inventory</a> /</span> Edit Data inventory
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Inventory</h5>
                <div class="card-body">
                    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" class="form-control" id="code" name="code"
                                value="{{$inventory->code}}" required>
                            @error('code')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{$inventory->name}}" required>
                            @error('name')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{$inventory->price}}" required>
                            @error('price')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="stock" class="form-label">stock</label>
                            <input type="text" class="form-control" id="stock" name="stock"
                                value="{{$inventory->stock}}" required>
                            @error('stock')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('inventory.index') }}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

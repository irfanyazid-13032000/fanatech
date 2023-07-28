@extends('layouts.app')

@section('title', 'Tambah Data Anggota Magang')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Asesor / <a class="text-decoration-none text-muted fw-light"
                href="">asesor</a> /</span> Tambah Data Asesor
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Asesor</h5>
                <div class="card-body">
                    <form action="{{route('asesor.simpan')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">No Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat"
                                value="{{ old('no_surat') }}" required>
                            @error('no_surat')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tempat</label>
                            <input type="text" class="form-control" id="tempat" name="tempat"
                                value="{{ old('tempat') }}" required>
                            @error('tempat')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anggota" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anggota" class="form-label">Jumlah Sesi</label>
                            <input type="number" class="form-control" id="jumlah_sesi" name="jumlah_asesi"
                                value="{{ old('jumlah_sesi') }}">
                            @error('alamat')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_anggota" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ old('tanggal') }}">
                            @error('alamat')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Data Pengalaman')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Status Persyaratan Pengalaman</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Persyaratan Pengalaman</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>no registrasi simpan</th>
                        <th>paket pekerjaan</th>
                        <th>tanggal awal</th>
                        <th>jabatan</th>
                        <th>surat referensi</th>
                        <th>jenis pengalaman</th>
                        <th>lokasi pekerjaan</th>
                        <th>tanggal akhir</th>
                        <th>nilai proyek</th>
                        <th>pengguna jasa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                        <td>{{$pengalaman->no_reg_simpan}}</td>
                        <td>{{$pengalaman->paket_pekerjaan}}</td>
                        <td>{{$pengalaman->tgl_awal}}</td>
                        <td>{{$pengalaman->jabatan}}</td>
                        <td>{{$pengalaman->surat_referensi}}</td>
                        <td>{{$pengalaman->jenis_pengalaman}}</td>
                        <td>{{$pengalaman->lokasi_pekerjaan}}</td>
                        <td>{{$pengalaman->tgl_akhir}}</td>
                        <td>{{$pengalaman->nilai_proyek}}</td>
                        <td>{{$pengalaman->pengguna_jasa}}</td>
                        <td>{{$pengalaman->status}}</td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <a href="" class="btn btn-success">Lengkap</a>
        <a href="" class="btn btn-info">Belum Lengkap</a>
        <a href="" class="btn btn-danger">Tolak</a>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush

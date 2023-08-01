@extends('layouts.app')
@section('title', 'Data Pelatihan')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Pelatihan</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">SKK</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>Penyelenggara</th>
                        <th>Tanggal Awal</th>
                        <th>Jam Pembayaran</th>
                        <th>File Sertifikat</th>
                        <th>Nama Pelatihan & Sertifikat</th>
                        <th>Tanggal Akhir</th>
                        <th>Jumlah Hari</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                   <tr>
                    <td>{{$pelatihan->penyelenggara}}</td>
                    <td>{{$pelatihan->tgl_awal}}</td>
                    <td>{{$pelatihan->jam_pembelajaran}}</td>
                    <td>{{$pelatihan->file_sertifikat}}</td>
                    <td>{{$pelatihan->nama_pelatihan_dan_sertifikat}}</td>
                    <td>{{$pelatihan->tgl_akhir}}</td>
                    <td>{{$pelatihan->jumlah_hari}}</td>
                    <td><a href="" class="btn btn-primary">{{$pelatihan->status}}</a></td>
                   </tr>
                   
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <a href="{{route('pelatihan.lengkap',['id'=>$pelatihan->id])}}" class="btn btn-success">Lengkap</a>
        <a href="{{route('pelatihan.belum.lengkap',['id'=>$pelatihan->id])}}" class="btn btn-info">Belum Lengkap</a>
        <a href="{{route('pelatihan.tolak',['id'=>$pelatihan->id])}}" class="btn btn-danger">Tolak</a>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush

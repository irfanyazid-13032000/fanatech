@extends('layouts.app')
@section('title', 'Data Personalia')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Status Personalia</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Personalia</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Email</th>
                        <th>NPWP</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>Negara</th>
                        <th>Kode Pos</th>
                        <th>Pas Foto</th>
                        <th>nama</th>
                        <th>tanggal lahir</th>
                        <th>telepon</th>
                        <th>jenis kelamin</th>
                        <th>kabupaten</th>
                        <th>file npwp</th>
                        <th>ktp</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                        <td>{{$personalia->nik}}</td>
                        <td>{{$personalia->tempat_lahir}}</td>
                        <td>{{$personalia->email}}</td>
                        <td>{{$personalia->npwp}}</td>
                        <td>{{$personalia->alamat}}</td>
                        <td>{{$personalia->provinsi}}</td>
                        <td>{{$personalia->negara}}</td>
                        <td>{{$personalia->kodepos}}</td>
                        <td>{{$personalia->pas_foto}}</td>
                        <td>{{$personalia->nama}}</td>
                        <td>{{$personalia->tgl_lahir}}</td>
                        <td>{{$personalia->telepon}}</td>
                        <td>{{$personalia->jenis_kelamin}}</td>
                        <td>{{$personalia->kabupaten}}</td>
                        <td>{{$personalia->file_npwp}}</td>
                        <td>{{$personalia->ktp}}</td>
                        <td><a href="" class="btn btn-primary">{{$personalia->status}}</a></td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
        <a href="{{route('personalia.lengkap',['id'=>$personalia->id])}}" class="btn btn-success">Lengkap</a>
        <a href="{{route('personalia.belum.lengkap',['id'=>$personalia->id])}}" class="btn btn-info">Belum Lengkap</a>
        <a href="{{route('personalia.tolak',['id'=>$personalia->id])}}" class="btn btn-danger">Tolak</a>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush

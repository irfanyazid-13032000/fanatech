@extends('layouts.app')
@section('title', 'Data SKK')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Status Pendidikan</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Pendidikan</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>institusi</th>
                        <th>jenjang</th>
                        <th>negara</th>
                        <th>kabupaten</th>
                        <th>file surat keterangan lulus</th>
                        <th>Program Studi</th>
                        <th>Tahun Lulus</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>File Ijazah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>{{$pendidikan->institusi}}</td>
                    <td>{{$pendidikan->jenjang}}</td>
                    <td>{{$pendidikan->negara}}</td>
                    <td>{{$pendidikan->kabupaten}}</td>
                    <td>{{$pendidikan->file_surat_ket_lulus}}</td>
                    <td>{{$pendidikan->program_studi}}</td>
                    <td>{{$pendidikan->tahun_lulus}}</td>
                    <td>{{$pendidikan->alamat}}</td>
                    <td>{{$pendidikan->provinsi}}</td>
                    <td>{{$pendidikan->file_ijazah}}</td>
                    <td>{{$pendidikan->status}}</td>
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

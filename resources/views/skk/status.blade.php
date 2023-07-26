@extends('layouts.app')
@section('title', 'Data SKK')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data SKK</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">SKK</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>TUK</th>
                        <th>No Registrasi Keanggotaan Asosiasi Profesi</th>
                        <th>Jenjang</th>
                        <th>Jenis Permohonan</th>
                        <th>LSP</th>
                        <th>Sertifikat SKK</th>
                        <th>Asosiasi</th>
                        <th>Kualifikasi</th>
                        <th>Klasifikasi</th>
                        <th>Sub Klasifikasi</th>
                        <th>Jabatan Kerja</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <tr>
                    <td>{{ $SKK->tuk }}</td>
                    <td>{{ $SKK->no_reg_keanggotaan_profesi }}</td>
                    <td>{{ $SKK->jenjang }}</td>
                    <td>{{ $SKK->jenis_permohonan }}</td>
                    <td>{{ $SKK->lsp }}</td>
                    <td>{{ $SKK->sertifikat_skk }}</td>
                    <td>{{ $SKK->asosiasi }}</td>
                    <td>{{ $SKK->kualifikasi }}</td>
                    <td>{{ $SKK->klasifikasi }}</td>
                    <td>{{ $SKK->sub_klasifikasi }}</td>
                    <td>{{ $SKK->jabatan_kerja }}</td>
                    @if ($SKK->status == '')
                    <td><a href="" class="btn btn-primary">submit</a></td>
                    @endif
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

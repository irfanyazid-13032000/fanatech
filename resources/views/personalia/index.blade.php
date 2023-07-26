@extends('layouts.app')
@section('title', 'Data Personalia')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Personalia</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Personalia</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Email</th>
                        <th>NPWP</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                        <th>KodePos</th>
                        <th>pas foto</th>
                        <th>Nama</th>
                        <th>tanggal lahir</th>
                        <th>telepon</th>
                        <th>jenis kelamin</th>
                        <th>negara</th>
                        <th>kebupaten</th>
                        <th>file NPWP</th>
                        <th>KTP</th>
                        <th>status</th>
                </thead>
                <tbody class="table-border-bottom-0">
                   
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: `{{route('data-personalia')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'nik', name: 'nik' },
                    { data: 'tempat_lahir', name: 'tempat_lahir' },
                    { data: 'email', name: 'email' },
                    { data: 'npwp', name: 'npwp' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'provinsi', name: 'provinsi' },
                    { data: 'kodepos', name: 'kodepos' },
                    { data: 'pas_foto', name: 'pas_foto' },
                    { data: 'nama', name: 'nama' },
                    { data: 'tgl_lahir', name: 'tgl_lahir' },
                    { data: 'telepon', name: 'telepon' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                    { data: 'negara', name: 'negara' },
                    { data: 'kabupaten', name: 'kabupaten' },
                    { data: 'file_npwp', name: 'file_npwp' },
                    { data: 'ktp', name: 'ktp' },
                    {
                        data:'status',
                        name:'status',
                        render:function (data,type,row,meta) {
                            if (row.status == '') {
                                return '<button class="btn btn-danger">Belum</button>'
                            }else{
                                return '<button class="btn btn-success">Sudah</button>'
                            }
                        }
                    },
                ],
                createdRow: function (row, data, dataIndex) {
                    // Set the row number
                    $(row).find('td:eq(0)').html(dataIndex + 1);
                }
               
            });
        });
    </script>
@endpush

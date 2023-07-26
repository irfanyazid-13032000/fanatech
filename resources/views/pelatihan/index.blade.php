@extends('layouts.app')
@section('title', 'Data Pelatihan')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Pelatihan</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Pelatihan</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Penyelenggara</th>
                        <th>Tanggal Awal</th>
                        <th>Jam Pembelajaran</th>
                        <th>File Sertifikat</th>
                        <th>Nama Pelatihan & sertifikat</th>
                        <th>Tgl Akhir</th>
                        <th>Jumlah Hari</th>
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
                ajax: `{{route('data-pelatihan')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'penyelenggara', name: 'penyelenggara' },
                    { data: 'tgl_awal', name: 'tgl_awal' },
                    { data: 'jam_pembelajaran', name: 'jam_pembelajaran' },
                    { data: 'file_sertifikat', name: 'file_sertifikat' },
                    { data: 'nama_pelatihan_dan_sertifikat', name: 'nama_pelatihan_dan_sertifikat' },
                    { data: 'tgl_akhir', name: 'tgl_akhir' },
                    { data: 'jumlah_hari', name: 'jumlah_hari' },
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

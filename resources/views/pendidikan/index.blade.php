@extends('layouts.app')
@section('title', 'Data Pendidikan')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Pendidikan</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Pendidikan</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Institusi</th>
                        <th>Jenjang</th>
                        <th>negara</th>
                        <th>kabupaten</th>
                        <th>file surat ket lulus</th>
                        <th>Program studi</th>
                        <th>tahun lulus</th>
                        <th>alamat</th>
                        <th>provinsi</th>
                        <th>File Ijazah</th>
                        <th>status</th>
                    </tr>
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
                ajax: `{{route('data-pendidikan')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'institusi', name: 'institusi' },
                    { data: 'jenjang', name: 'jenjang' },
                    { data: 'negara', name: 'negara' },
                    { data: 'kabupaten', name: 'kabupaten' },
                    { data: 'file_surat_ket_lulus', name: 'file_surat_ket_lulus' },
                    { data: 'program_studi', name: 'program_studi' },
                    { data: 'tahun_lulus', name: 'tahun_lulus' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'provinsi', name: 'provinsi' },
                    { data: 'file_ijazah', name: 'file_ijazah' },
                    {
                        data:'status',
                        name:'status',
                        render:function (data,type,row,meta) {
                            var baseUrl = "{{ route('pendidikan.status', ['id' => ':id']) }}";
                            var statusUrl = baseUrl.replace(':id', row.id);

                            if (row.status == '') {
                                return `<a href="${statusUrl}" class="btn btn-danger">Belum</a>`;
                                // return row.id;
                            }else{
                                return `<a href="${statusUrl}" class="btn btn-success">Sudah</a>`
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

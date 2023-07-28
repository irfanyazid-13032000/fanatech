@extends('layouts.app')
@section('title', 'Data Asesor')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Asesor</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Asesor</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>no surat</th>
                        <th>tempat</th>
                        <th>alamat</th>
                        <th>jumlah asesi</th>
                        <th>tanggal</th>
                        <th>tugas</th>
                </thead>
                <tbody class="table-border-bottom-0">
                   
                </tbody>
            </table>
            <a href="{{route('asesor.tambah')}}" class="btn btn-success">tambah</a>
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
                ajax: `{{route('data-asesor')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'no_surat', name: 'no_surat' },
                    { data: 'tempat', name: 'tempat' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'jumlah_asesi', name: 'jumlah_asesi' },
                    { data: 'tanggal', name: 'tanggal' },
                    {
                        data:null,
                        name:'status',
                        render:function (data,type,row,meta) {
                          var baseUrl = "{{ route('anggota.asesor', ['no_surat' => ':no_surat']) }}";
                          var anggotaUrl = baseUrl.replace(':no_surat', row.no_surat);
                              return `<a href="${anggotaUrl}" class="btn btn-danger">Anggota</a>`
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

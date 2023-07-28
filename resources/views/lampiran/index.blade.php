@extends('layouts.app')
@section('title', 'Data Lampiran')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Lampiran</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Lampiran</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>no surat</th>
                        <th>tanggal</th>
                        <th>tempat</th>
                        <th>asesi</th>
                        <th>action</th>
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
                ajax: `{{route('data-lampiran')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'no_surat', name: 'no_surat' },
                    { data: 'tanggal', name: 'tanggal' },
                    { data: 'tempat', name: 'tempat' },
                    {
                        data:null,
                        name:'peserta',
                        render:function (data,type,row,meta) {
                          let pesertaUrl = "{{ route('lampiran.peserta', ['no_surat' => ':no_surat']) }}";
                          let fullPesertaUrl = pesertaUrl.replace(':no_surat', row.no_surat);

                          let cek = `<a href="${fullPesertaUrl}" class="btn btn-info">Cek</a> `;
                          return cek ;
                      }
                    },
                    {
                        data:null,
                        name:'status',
                        render:function (data,type,row,meta) {
          

                          let deleteUrl = "{{ route('berita.destroy', ['no_surat' => ':no_surat']) }}";
                          let fullDeleteUrl = deleteUrl.replace(':no_surat', row.no_surat);
                          
                          let exportUrl = "{{ route('berita.export', ['no_surat' => ':no_surat']) }}";
                          let fullExportUrl = exportUrl.replace(':no_surat', row.no_surat);


                          let hapus = `<a href="${fullDeleteUrl}" class="btn btn-danger">Hapus</a> `;
                          let exportPDF = `<a href="${fullExportUrl}" class="btn btn-success">Export</a>`;


                          return hapus + exportPDF ;
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

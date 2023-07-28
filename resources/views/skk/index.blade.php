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
                        <th>No</th>
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
                ajax: `{{route('data-skk')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'tuk', name: 'tuk' },
                    { data: 'no_reg_keanggotaan_profesi', name: 'no_reg_keanggotaan_profesi' },
                    { data: 'jenjang', name: 'jenjang' },
                    { data: 'jenis_permohonan', name: 'jenis_permohonan' },
                    { data: 'lsp', name: 'lsp' },
                    { data: 'sertifikat_skk', name: 'sertifikat_skk' },
                    { data: 'asosiasi', name: 'asosiasi' },
                    { data: 'kualifikasi', name: 'kualifikasi' },
                    { data: 'klasifikasi', name: 'klasifikasi' },
                    { data: 'sub_klasifikasi', name: 'sub_klasifikasi' },
                    { data: 'jabatan_kerja', name: 'jabatan_kerja' },
                    {
                        data:'status',
                        name:'status',
                        render:function (data,type,row,meta) {
                            var baseUrl = "{{ route('skk.status', ['id' => ':id']) }}";
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

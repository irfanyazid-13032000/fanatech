@extends('layouts.app')
@section('title', 'Data Pengalaman')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Pengalaman</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Pengalaman</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>No Reg Simpan</th>
                        <th>Paket Pekerjaan</th>
                        <th>Tgl Awal</th>
                        <th>Jabatan</th>
                        <th>Surat Referensi</th>
                        <th>Jenis Pengalaman</th>
                        <th>Lokasi Pekerjaan</th>
                        <th>Tgl Akhir</th>
                        <th>Nilai Proyek</th>
                        <th>Pengguna Jasa</th>
                        <th>Status</th>
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
                ajax: `{{route('data-pengalaman')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'no_reg_simpan', name: 'no_reg_simpan' },
                    { data: 'paket_pekerjaan', name: 'paket_pekerjaan' },
                    { data: 'tgl_awal', name: 'tgl_awal' },
                    { data: 'jabatan', name: 'jabatan' },
                    { data: 'surat_referensi', name: 'surat_referensi' },
                    { data: 'jenis_pengalaman', name: 'jenis_pengalaman' },
                    { data: 'lokasi_pekerjaan', name: 'lokasi_pekerjaan' },
                    { data: 'tgl_akhir', name: 'tgl_akhir' },
                    { data: 'nilai_proyek', name: 'nilai_proyek' },
                    { data: 'pengguna_jasa', name: 'pengguna_jasa' },
                    {
                        data:'status',
                        name:'status',
                        render:function (data,type,row,meta) {
                            var baseUrl = "{{ route('pengalaman.status', ['id' => ':id']) }}";
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

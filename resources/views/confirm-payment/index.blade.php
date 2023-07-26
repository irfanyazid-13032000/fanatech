@extends('layouts.app')
@section('title', 'Data Konfirmasi Pembayaran')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Konfirmasi Pembayaran</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Konfirmasi Pembayaran</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>User</th>
                        <th>Invoice</th>
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
                ajax: `{{route('data-confirm')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'invoice_id', name: 'invoice_id' },
                    { data: 'status', name: 'status' },
                    
                ],
                createdRow: function (row, data, dataIndex) {
                    // Set the row number
                    $(row).find('td:eq(0)').html(dataIndex + 1);
                }
               
            });
        });
    </script>
@endpush

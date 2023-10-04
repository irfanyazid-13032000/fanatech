@extends('layouts.app')
@section('title', 'Data Inventory')
@section('content')


    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Inventory</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Inventory</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>code</th>
                        <th>name</th>
                        <th>price</th>
                        <th>stock</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                   
                </tbody>
            </table>

            <a href="{{route("inventory.create")}}" class="btn btn-success mt-3">Add</a>


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
                ajax: `{{route('data-inventory')}}`,
                columns: [
                    { data: null, name: 'row_number', searchable: false, orderable: false, className: 'text-center' },
                    { data: 'code', name: 'code' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'stock', name: 'stock' },
                    {
                        data:'status',
                        name:'status',
                        render:function (data,type,row,meta) {
                            var baseUrlEdit = "{{ route('inventory.edit', ['id' => ':id']) }}";
                            var EditUrl = baseUrlEdit.replace(':id', row.id);

                            var editButton = `<a href="${EditUrl}" class="btn btn-primary">Edit</a>`;

                            return editButton;
                           
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

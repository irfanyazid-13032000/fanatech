@extends('layouts.app')
@section('title', 'Detail')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Detail Data Purchase</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Detail Data Purchase</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Inventory</th>
                        <th>qty</th>
                        <th>price</th>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script>
      $(document).ready(function () {
    var urlAjax = "{{ route('data-purchase', ['id' => ':id']) }}"
    var urlAjax = urlAjax.replace(':id', '{{$id}}')
    
    var dataTable = $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
              extend:'pdfHtml5',
              exportOptions: {
                columns: [1, 2, 3],
            },
          },
            {
              extend:'csvHtml5',
              exportOptions: {
                columns: [1, 2, 3],
            },
          },
            {
              extend:'excelHtml5',
              exportOptions: {
                columns: [1, 2, 3],
            },
          }
        ],
        processing: true,
        serverSide: true,
        ajax: urlAjax,
        columns: [
            { data: null, name: 'No', orderable: false, searchable: false, className: 'text-center' },
            { data: 'name', name: 'name' },
            { data: 'qty', name: 'qty' },
            { data: 'price', name: 'price' },
        ],
        createdRow: function (row, data, dataIndex) {
            // Set the row number
            $('td:eq(0)', row).html(dataIndex + 1);
        }
    });
});

    </script>
@endpush

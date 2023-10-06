@extends('layouts.app')

@section('title', 'Tambah Data Inventory')

@section('content')



    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a class="text-decoration-none text-muted fw-light"
                href="{{ route('sale.index') }}">Data Sale</a> /</span>
        Tambah Sale
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Sale</h5>
                <div class="card-body">
                    <form action="{{route('sale.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="number" class="form-label">number</label>
                            <input type="text" class="form-control" id="number" name="number"
                                value="{{"Sale-" . date('Y-m-d') . "-" . $lastId->id + 1}}" readonly>
                            @error('number')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="div-sales-table"></div>
                                               
                        
                        
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('sale.index') }}" class="btn btn-danger ms-3">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

<script>

    $('#inventory_id').select2({})

    let i = 0;
    
    function loadTableAwalSale() {
        var routeUrl = "{{ route('sale.table.awal',':i') }}";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#div-sales-table').html(res)
                  $('#inventory_id' + i).select2()
                  addRowSale()
                }
            });
    }

    loadTableAwalSale()


    function addRowSale() {
        $('#add-row').on('click',function (params) {
            ++i


            var routeUrl = "{{ route('sale.table.tambahan',':i') }}";
            routeUrl = routeUrl.replace(':i', i);

            $.ajax({
                url: routeUrl,
                method: 'GET',
                success: function(res) {
                  $('#table-sales').append(res)
                  $('#inventory_id' + i).select2()
                  deleteRow(i)
                }
            });

            
        })
        
    }


    function deleteRow(i) {
    $(".delete-row").click(function() {
        var row = $(this).closest("tr");
        row.remove();
      });
  }



</script>

    
@endpush




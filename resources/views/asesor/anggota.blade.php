@extends('layouts.app')
@section('title', 'Data Asesor')
@section('content')
{{--  {{ dd($anggotas) }}  --}}
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Anggota Tugas Asesor</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Asesor {{$no_surat}}</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>nama</th>
                        <th>jabatan</th>
                        <th>reg met</th>
                        <th>action</th>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($anggotas as $anggota)
                  <tr>
                   <td>{{$loop->iteration }}</td>
                   <td>{{$anggota->nama}}</td>
                   <td>{{$anggota->jabatan}}</td>
                   <td>{{$anggota->reg_met}}</td>
                   <td><a href="{{route('anggota.hapus',['no_surat'=>$no_surat,'id'=>$anggota->id])}}">hapus</a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
</div>

<br>

        <div class="card">
          <div class="card-body">
                    <form action="{{route('anggota.tambah',['no_surat'=>$no_surat])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="{{ old('jabatan') }}" required>
                            @error('jabatan')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Reg Met</label>
                            <input type="text" class="form-control" id="reg_met" name="reg_met"
                                value="{{ old('reg_met') }}" required>
                            @error('reg_met')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    
                    
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
                            <a href="{{route('export.surat',['no_surat'=>$no_surat])}}" class="btn btn-success ms-3">Export Surat</a>
                        </div>
                    </form>
                </div>
                </div>
</div>
   
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
@endpush

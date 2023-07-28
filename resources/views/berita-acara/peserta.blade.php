@extends('layouts.app')
@section('title', 'Data Peserta')
@section('content')
{{--  {{ dd($anggotas) }}  --}}
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Berita Acara</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Berita acara :  {{$no_surat}}</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>nama</th>
                        <th>skema</th>
                        <th>hasil</th>
                        <th>action</th>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($pesertaTes as $peserta)
                  <tr>
                   <td>{{$loop->iteration }}</td>
                   <td>{{$peserta->nama}}</td>
                   <td>{{$peserta->skema}}</td>
                   <td>{{$peserta->hasil}}</td>
                   <td><a href="{{route('peserta.hapus',['no_surat'=>$no_surat,'id'=>$peserta->id])}}">hapus</a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
</div>

<br>

        <div class="card">
          <div class="card-body">
                    <form action="{{route('peserta.tambah',['no_surat'=>$no_surat])}}" method="POST">
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
                            <label for="skema" class="form-label">skema</label>
                            <input type="text" class="form-control" id="skema" name="skema"
                                value="{{ old('skema') }}" required>
                            @error('skema')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="hasil" class="form-label">hasil</label>
                            <input type="number" class="form-control" id="hasil" name="hasil"
                                value="{{ old('hasil') }}" required>
                            @error('hasil')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    
                    
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
                            <a href="{{route('berita.export',['no_surat'=>$no_surat])}}" class="btn btn-success ms-3">Export Berita Acara</a>
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

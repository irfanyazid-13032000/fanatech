@extends('layouts.app')
@section('title', 'Data Peserta')
@section('content')
{{--  {{ dd($anggotas) }}  --}}
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Data Lampiran </h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Lampiran : {{$no_surat}}</h5>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>nama</th>
                        <th>skema</th>
                        <th>jam</th>
                        <th>ruang</th>
                        <th>asesor</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($asesi_lampiran as $asesi)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$asesi->nama_asesi}}</td>
                    <td>{{$asesi->skema}}</td>
                    <td>{{$asesi->jam}}</td>
                    <td>{{$asesi->ruang}}</td>
                    <td>{{$asesi->asesor}}</td>
                    <td><a href="{{route('lampiran.peserta.hapus',['no_surat'=>$no_surat,'id'=>$asesi->id])}}">hapus</a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
</div>

<br>

        <div class="card">
          <div class="card-body">
                    <form action="{{route('lampiran.peserta.tambah',['no_surat'=>$no_surat])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama_asesi"
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
                            <label for="jam" class="form-label">jam</label>
                            <input type="time" class="form-control" id="jam" name="jam"
                                value="{{ old('jam') }}" required>
                            @error('jam')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ruang" class="form-label">ruang</label>
                            <input type="text" class="form-control" id="ruang" name="ruang"
                                value="{{ old('ruang') }}" required>
                            @error('ruang')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="asesor" class="form-label">asesor</label>
                            <input type="text" class="form-control" id="asesor" name="asesor"
                                value="{{ old('asesor') }}" required>
                            @error('asesor')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>

                    
                    
                      
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                            <a href="" class="btn btn-danger ms-3">Kembali</a>
                            <a href="{{route('lampiran.export',['no_surat'=>$no_surat])}}" class="btn btn-success ms-3">Export lampiran</a>
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

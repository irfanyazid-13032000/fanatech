@extends('layouts.app')

@section('title', 'Tambah Data Approval')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Internship / <a class="text-decoration-none text-muted fw-light"
                href="{{ route('approval.index') }}">Approval</a> /</span>
        Tambah Approval
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Tambah Data Approval</h5>
                <div class="card-body">
                    <form action="{{ route('approver.store') }}" method="POST" >
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
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}" required>
                            @error('password')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Divisi</label>
                            <select class="form-select" id="role" name="role" aria-label="role"
                                value="{{ old('role') }}" required>
                                @foreach ($role as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="level_approval" class="form-label">level approval</label>
                            <select class="form-select level_approval" name="level_approval" aria-label="level_approval" onchange="jumlahApprover()"
                                value="{{ old('level_approval') }}" required>
                                <option value="0">pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            @error('level_approval')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3" id="approver">
                            
                        </div>




                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
  function jumlahApprover()
  {
    var selectedValue = $('.level_approval').val()
   
        // Lakukan apa pun yang perlu Anda lakukan dengan nilai selectedValue di sini
        // Contoh:
    // console.log("Nilai terpilih: " + selectedValue);

    $('#approver').empty();

    for (let i = 0; i < selectedValue; i++) {
      
    $.ajax({
      url: `{{ url('/approver') }}/`+i, // Ganti dengan URL yang sesuai
      type: 'GET',
      data: {
      _token: '{{ csrf_token() }}' // Jika menggunakan CSRF protection
         },
      success: function(response) {
        // Manipulasi respons dari controller di sini
        
        $('#approver').append(response);

        },
       error: function(xhr) {
         console.log(xhr.responseText);
         }
      });

    }


  }


</script>

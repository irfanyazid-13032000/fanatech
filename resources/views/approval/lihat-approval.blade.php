@extends('layouts.app')

@section('title', 'Lihat Approval')

@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Lihat Approval</h5>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{$approval->title}}" readonly>
                        </div>
                       
                        <div class="mb-3">
                            <label for="comment" class="form-label">comment</label>
                            <input type="comment" class="form-control" id="comment" name="comment"
                                value="{{$approval->comment}}" readonly>
                        </div>


                        <div class="mb-3">
                            <label for="document" class="form-label">document</label>
                            <input type="document" class="form-control" id="document" name="document"
                                value="{{$approval->document}}" readonly>
                        </div>
                       
                        
                      
                      
                      
                        
                        
                       
                        <div class="d-flex justify-content-end mt-2">
                          @if ($giliranMu)
                          <button class="btn btn-primary" type="submit">Approve</button>
                          <button class="btn btn-danger" type="submit">Reject</button>
                          @endif
                            <a href="{{ route('responsibility.index') }}" class="btn btn-success ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

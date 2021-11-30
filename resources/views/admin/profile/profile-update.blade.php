@extends('admin.layout')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><i class="fas fa-check-circle"></i></strong>&ensp;{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@elseif (session('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>&times;</strong>&ensp;{{ session('failed') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
            
<div class="row">

    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Update Profile</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateprofile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Current Image</label>
                        <div class="p-3">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img src="{{ asset(Auth::user()->profile_photo_url) }}" class="user-image" alt="User Image" / style="min-width: 100px; max-width: 100px; min-height: 100px; max-height: 100px; border-radius: 50%; ">
                            @endif
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Update Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ Auth::user()->name }}">
                        @error('name')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Update Email</label>
                        <input type="email" class="form-control" name="email" autocomplete="off" value="{{ Auth::user()->email }}">
                        @error('email')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Update Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose Image</label>

                            @error('image')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection

@extends('admin.layout')

@section('content')

            
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><i class="fas fa-check-circle"></i></strong>&ensp;{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="row">

    @if (empty($about))
    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Add About</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('about.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" autocomplete="off" value="{{ old('title') }}">
                        @error('title')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            SAVE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title mr-2">{{ $about->title }}</h6>
                <div class="p-0 w-100 text-right">
                    <a href="{{ route('about.edit', ['id'=> $about->id]) }}" class="btn btn-primary">EDIT</a>
                </div>
            </div>
            <div class="card-body">
                {{ $about->description }}
            </div>
        </div>
    </div>
    @endif

</div>

@endsection

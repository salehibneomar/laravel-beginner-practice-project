@extends('admin.layout')

@section('content')

            
<div class="row">

    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Edit About</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('about.update', ['id'=>$about->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Edit Title</label>
                        <input type="text" class="form-control" name="title" autocomplete="off" value="{{ $about->title }}">
                        @error('title')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Edit Description</label>
                        <textarea class="form-control" name="description" rows="5">{{ $about->description }}</textarea>
                        @error('description')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
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

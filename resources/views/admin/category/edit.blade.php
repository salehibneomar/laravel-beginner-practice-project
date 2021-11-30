@extends('admin.layout')

@section('content')
  
<div class="row">
    <!-- edit Cat form -->
    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Edit Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.cat', ['id'=>$category->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Edit Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $category->name }}">
                        @error('name')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
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


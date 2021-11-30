@extends('admin.layout')

@section('content')

<div class="row">
                <!-- Edit Brand form -->
                <div class="col-lg-12 my-1">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h6 class="card-title">Edit Brand</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.brand', ['id'=>$brand->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Edit Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $brand->name }}">
                                    @error('name')
                                        <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Edit Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>

                                        @error('image')
                                        <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Current Image</label>
                                    <div class="p-3">
                                        <img src="{{ asset($brand->image) }}" alt="image" style="min-width:360px;max-width: 360px;min-height:20px;max-height:200px;">
                                    </div>
                                    <input type="hidden" name="old_image" value="{{ $brand->image }}" required readonly>
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





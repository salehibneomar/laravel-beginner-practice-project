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
                <!-- All cat view table col-->
                <div class="col-lg-8 my-1">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h6 class="card-title">Sliders</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">ID#</th>
                                        <th>Title</th>
                                        <th style="width: 15%">Image</th>
                                        <th style="width: 20%">User</th>
                                        <th style="width: 25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <td>
                                            <span class="badge badge-secondary">
                                                {{ $slider->id }}
                                            </span>
                                        </td>
                                        <td>{{ $slider->title }}</td>
                                        <td>
                                            <img style="min-width:70px; max-width: 70px; min-height:50px; max-height:50px; border: 1px solid rgba(0, 0, 0, 0.2);" src="{{ asset($slider->image) }}" alt="image">
                                        </td>
                                        <td>{{ $slider->user->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#desc_{{ $slider->id }}">
                                                <i class="fas fa-file-alt"></i>
                                            </button>
                                            <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('slider/delete/'.$slider->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                                                                   <!-- Modal -->
                                        <div class="modal fade" id="desc_{{ $slider->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body p-5">
                                                {{ $slider->description }}
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
                                        </td>
                                                                                
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <nav class="mt-4">
                                <ul class="pagination justify-content-end">
                                   {{ $sliders->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Add Cat form -->
                <div class="col-lg-4 my-1">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h6 class="card-title">Add Slider</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.slider') }}" method="post" enctype="multipart/form-data">
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
                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>

                                        @error('image')
                                        <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
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

    </div>


@endsection
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
                            <h6 class="card-title">Brands</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">SL#</th>
                                        <th>Name</th>
                                        <th style="width: 15%">Image</th>
                                        <th style="width: 20%">User</th>
                                        <th style="width: 25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allBrands as $brand)
                                        <tr>
                                            <td>
                                                <span class="badge badge-secondary">
                                                    {{ $allBrands->firstItem()+$loop->index }}
                                                </span>
                                            </td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                <img style="min-width:70px; max-width: 70px; min-height:50px; max-height:50px; border: 1px solid rgba(0, 0, 0, 0.2);" src="{{ asset($brand->image) }}" alt="image">
                                            </td>
                                            <td>{{ $brand->user->name }}</td>
                                            <td>
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ url('brand/soft-delete/'.$brand->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav class="mt-4">
                                <ul class="pagination justify-content-end">
                                    {{ $allBrands->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Add Cat form -->
                <div class="col-lg-4 my-1">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h6 class="card-title">Add Brand</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off">
                                    @error('name')
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

    <div class="row mt-2">
                <!-- Category Trash Table -->
                <div class="col-lg-8 my-1">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h6 class="card-title">Trash Brands</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">SL#</th>
                                        <th>Name</th>
                                        <th style="width: 15%">Image</th>
                                        <th style="width: 20%">User</th>
                                        <th style="width: 25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trashBrands as $brand)
                                        <tr>
                                            <td>
                                                <span class="badge badge-secondary">
                                                    {{ $trashBrands->firstItem()+$loop->index }}
                                                </span>
                                            </td>
                                            <td>{{ $brand->name }}</td>
                                            <td>
                                                <img style="min-width:70px; max-width: 70px; min-height:50px; max-height:50px; border: 1px solid rgba(0, 0, 0, 0.2);" src="{{ asset($brand->image) }}" alt="image">
                                            </td>
                                            <td>{{ $brand->user->name }}</td>
                                            <td>
                                                <a href="{{ url('brand/restore/'.$brand->id) }}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>
                                                <a href="{{ url('brand/permanent-del/'.$brand->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav class="mt-4">
                                <ul class="pagination justify-content-end">
                                    {{ $trashBrands->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
    </div>


@endsection


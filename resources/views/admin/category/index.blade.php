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
                <h6 class="card-title">Categories</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 2%">SL#</th>
                            <th>Name</th>
                            <th style="width: 20%">User</th>
                            <th style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allCategories as $category)
                            <tr>
                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $allCategories->firstItem()+$loop->index }}
                                    </span>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ url('category/soft-delete/'.$category->id) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav class="mt-4">
                    <ul class="pagination justify-content-end">
                        {{ $allCategories->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Add Cat form -->
    <div class="col-lg-4 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Add Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('store.cat') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" autocomplete="off">
                        @error('name')
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

</div>

<div class="row mt-2">
    <!-- Category Trash Table -->
    <div class="col-lg-8 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Trash Categories</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 2%">SL#</th>
                            <th>Name</th>
                            <th style="width: 20%">User</th>
                            <th style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashedCategories as $category)
                            <tr>
                                <td>
                                    <span class="badge badge-secondary">
                                        {{ $trashedCategories->firstItem()+$loop->index }}
                                    </span>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-trash-restore"></i>
                                    </a>
                                    <a href="{{ url('category/permanent-del/'.$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" >
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="mt-4">
                    <ul class="pagination justify-content-end">
                        {{ $trashedCategories->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection

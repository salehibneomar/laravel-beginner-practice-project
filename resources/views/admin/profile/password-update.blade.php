@extends('admin.layout')

@section('content')

            
<div class="row">

    <div class="col-lg-12 my-1">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h6 class="card-title">Update Password</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updatepass') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" class="form-control" name="current_password" autocomplete="off" >
                        @error('current_password')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror
                        @if (session('error'))
                        <span class="mt-2 form-text text-danger text-sm">{{ session('error') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password" autocomplete="off" >
                        @error('new_password')
                            <span class="mt-2 form-text text-danger text-sm">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" class="form-control" name="new_password_confirmation" autocomplete="off" >
                        @error('new_password_confirmation')
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

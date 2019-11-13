@extends('backend.layouts.content')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_new" class="form-control" value="*******" disabled>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Role ID</label>
                        <input type="text" name="role_id" class="form-control" value="{{ $user->role_id }}" disabled>
                    </div>


                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control" value="{{ $user->gender }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="{{ route('admin-user-index') }}" class="btn btn-secondary">User List</a>
    </div>
@endsection

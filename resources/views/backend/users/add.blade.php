@extends('backend.layouts.content')

@section('content')
    <form action="{{ route('admin-user-add') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('password') }}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
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
                            {{ Form::select('role_id', [null => 'Please choose a Role'] + $roles, old('role_id'), ['class' => 'form-control']) }}
                        </div>




                        <div class="form-group">
                            <label>Gender</label>
                            {{ Form::select('gender', [null => 'Please choose a Gender'] + $genders, old('gender'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
                            <label>Note</label>
                            <input type="text" name="note" class="form-control" value="{{ ('note') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('admin-user-index') }}" class="btn btn-secondary">User List</a>
            <input type="submit" value="Add" name="submit" class="btn btn-success">
        </div>
    </form>
@endsection

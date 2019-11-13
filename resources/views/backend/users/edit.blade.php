@extends('backend.layouts.content')

@section('content')
    <form action="{{ route('admin-user-edit', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password_new" class="form-control" value="">
                        </div>

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
                            {{ Form::select('role_id', [null => 'Please choose a Role'] + $roles, $user->role_id, ['class' => 'form-control']) }}
                        </div>


                        <div class="form-group">
                            <label>Gender</label>
                            @if ($user->gender == "nam")
                                {!! Form::select('gender', ['nam' => 'Nam', 'nu' => 'Nu'], 'nam',['class' => 'form-control']); !!}
                            @elseif ($user->gender == "nu")
                                {!! Form::select('gender', ['nam' => 'Nam', 'nu' => 'nu'], 'nu',['class' => 'form-control']); !!}
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('admin-user-index') }}" class="btn btn-secondary">User List</a>
            <input type="submit" value="Update" name="Update" class="btn btn-success">
        </div>
    </form>
@endsection

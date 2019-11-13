@extends('backend.layouts.content')

@section('content')
    <form action="{{ route('admin-product-add') }}" method="post" enctype="multipart/form-data">
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
                            <label>Name of product</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                        </div>

                        <div class="form-group">
                            <label>Unit_Price</label>
                            <input type="text" name="unit_price" class="form-control" value="{{ old('unit_price') }}">
                        </div>

                        <div class="form-group">
                            <label>Promotion_Price</label>
                            <input type="text" name="promotion_price" class="form-control" value="{{ old('promotion_price') }}">
                        </div>

                        <div class="form-group">
                            <label for="customFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
                            <label>Category ID</label>
                            {{ Form::select('category_id', [null => 'Please choose category'] + $categories, old('category_id'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" name="unit" class="form-control" value="{{ old('unit') }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('admin-product-index') }}" class="btn btn-secondary">Product List</a>
            <input type="submit" value="Add" name="submit" class="btn btn-success">
        </div>
    </form>
@endsection

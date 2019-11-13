@extends('backend.layouts.content')

@section('content')
    <form action="{{ route('admin-product-edit', $product->id) }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                        </div>

                        <div class="form-group">
                            <label>Unit_price</label>
                            <input type="text" name="unit_price" class="form-control" value="{{ $product->unit_price }}">
                        </div>

                        <div class="form-group">
                            <label>Promotion_price</label>
                            <input type="text" name="promotion_price" class="form-control" value="{{ $product->promotion_price }}">
                        </div>

                        <div class="form-group">
                            <label for="customFile">Image</label><br>
                            @if(!empty($product->image) && Storage::disk('local')->exists($product->image))
                                <img src="{{ Storage::disk('local')->url($product->image) }}" alt="{{ $product->image }}" class="img-fluid">
                            @endif
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="picture">
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
                            {{ Form::select('category_id', [null => 'Please choose category'] + $categories, $product->category_id, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            <label>Unit</label>
                            <textarea name="unit"  class="form-control">{{ $product->unit }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <a href="{{ route('admin-product-index') }}" class="btn btn-secondary">Product List</a>
            <input type="submit" value="Update" name="submit" class="btn btn-success">
        </div>
    </form>
@endsection

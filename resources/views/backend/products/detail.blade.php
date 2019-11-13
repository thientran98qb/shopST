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
                        <label>Name of product</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="product" class="form-control" value="{{ $product->description }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Unit_price</label>
                        <input type="text" name="unit_price" class="form-control" value="{{ $product->unit_price }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Promotion_price</label>
                        <input type="text" name="promotion_price" class="form-control" value="{{ $product->promotion_price }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="customFile">Image</label><br>
                        @if(!empty($product->image) && Storage::disk('local')->exists($product->image))
                            <img src="{{ Storage::disk('local')->url($product->image) }}" alt="{{ $product->image }}" class="img-fluid">
                        @endif
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
                        <input type="text" name="category_id" value="{{ $product->category->name }}" disabled class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ $product->unit }}" disabled>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="{{ route('admin-product-index') }}" class="btn btn-dark">Product List</a>
    </div>
@endsection

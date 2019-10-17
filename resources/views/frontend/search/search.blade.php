@extends('frontend.layouts.content')

@section('content')

    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm Thấy {{count($product)}} Sản Phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product as $pr)
                                    <div class="col-sm-3 " >
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="{{ route('detailsp',$pr->id) }}"><img src="source/image/product/{{$pr->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pr->name}}</p>
                                                <p class="single-item-price">
                                                    <span>{{$pr->unit_price}}</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{ route('add-to-cart',$pr->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{ route('detailsp',$pr->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->

@stop

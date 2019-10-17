@extends('frontend.layouts.content')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{ $loai_sp->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('home') }}">Home</a> / <span>Loại Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($loai as $l)
                        <li><a href="{{ route('lsp',$l->id) }}">{{$l->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">

                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{ route('detailsp',$sp->id) }}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price" style="font-size: 18px">

                                            @if($sp->promotion_price!=0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            <span class="flash-del">{{number_format($sp->unit_price)}} đồng</span>
                                            <span class="flash-sale">{{number_format($sp->unit_price-$sp->promotion_price)}} đồng</span>
                                            @else
                                                <span>{{number_format($sp->unit_price)}}đồng</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{ route('add-to-cart',$sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{ route('detailsp',$sp->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản Phẩm Khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thây {{count($sp_khac)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sp_khac as $spk)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{ route("detailsp",$spk->id) }}"><img src="source/image/product/{{$spk->image}}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$spk->name}}</p>
                                            <p class="single-item-price" style="font-size: 18px">

                                            @if($spk->promotion_price!=0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                <span class="flash-del">{{number_format($spk->unit_price)}} đồng</span>
                                                <span class="flash-sale">{{number_format($spk->unit_price-$spk->promotion_price)}} đồng</span>
                                            @else
                                                <span>{{number_format($spk->unit_price)}}đồng</span>
                                                @endif
                                                </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{ route('add-to-cart',$spk->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{ route("detailsp",$spk->id) }}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->

@stop



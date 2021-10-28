@extends('frontend.layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach($mobiles as $mobile)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <a href="">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img
                                    src="{{$mobile->mainThumbnail}}"
                                    alt=""/>
                                <h2>{{$mobile->price}} USD</h2>
                                <p>{{$mobile->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm
                                    giỏ
                                    hàng</a>
                            </div>

                        </div>
                    </a>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

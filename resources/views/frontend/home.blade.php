@extends('frontend.layout')
@section('titleMain')
    <title>CellPhoneXSMAX - HOME</title>
@endsection
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach($mobiles as $mobile)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <form action="/cart/add?id={{$mobile->id}}&quantity=1" method="POST">
                        @csrf
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="/detail?id={{$mobile->id}}"><img
                                        src="{{$mobile->mainThumbnail}}"
                                        alt=""/></a>
                                <h2>{{$mobile->price}} USD</h2>
                                <p>{{$mobile->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart">
                                    <button type="submit" class="fa fa-shopping-cart ">Thêm giỏ hàng</button>
                                </a>
                            </div>
                        </div>
                    </form>
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

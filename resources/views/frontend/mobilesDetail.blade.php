@extends('frontend.layout')
@section('titleMain')
    <title>CellPhoneXSMAX - Mobile detail</title>
@endsection
@section('content')
    <div class="product-details"><!--product-details-->
        {{--            anh minh hoa--}}
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{$item->mainThumbnail}}"
                     alt=""/>
                <h3>ZOOM</h3>
            </div>
        </div>
        {{--            thong tin san phan--}}
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                <h2>{{$item->name}}</h2>
                <p>Mã ID: {{$item->id}}</p>
                <img src="images/product-details/rating.png" alt=""/>

                <form action="/cart/add?id={{$item->id}}" method="POST">
                    {{ csrf_field() }}
                    <span>
									<span>{{$item->price}} USD</span>

									<label>Số lượng:</label>
									<input name="quantity" type="number" min="1" value="1"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>
								</span>
                </form>

                <p><b>Tình trạng:</b> {{$item->strStatus}}</p>
                <p><b>Điều kiện:</b> Mơi 100%</p>
                <p><b>Thương hiệu:</b> {{$item->brandID}}</p>
                <p><b>Danh mục:</b> {{$item->brandID}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""/></a>
            </div><!--/product-information-->
        </div>
    </div>
    {{--        thong tin chi tiet san pham 3 tabs--}}
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>

                <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum</p>
            </div>

            <div class="tab-pane fade" id="companyprofile">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
            <div class="tab-pane fade" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                        <textarea name=""></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt=""/>
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/category-tab-->
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                {{--                <div class="item active">--}}
                {{--                    @foreach($relate as $key => $lienquan)--}}
                {{--                        <div class="col-sm-4">--}}
                {{--                            <div class="product-image-wrapper">--}}
                {{--                                <div class="single-products">--}}
                {{--                                    <div class="productinfo text-center">--}}
                {{--                                        <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />--}}
                {{--                                        <h2>Price 1000 USD</h2>--}}
                {{--                                        <p>Product name</p>--}}
                {{--                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>--}}
                {{--                                    </div>--}}

                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    @endforeach--}}


                {{--                </div>--}}
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="P5EUx7PI"></script>
    <div class="fb-comments" data-href="http://127.0.0.1:8000/detail?id={{$item->id}}" data-width="" data-numposts="5"></div>
@endsection

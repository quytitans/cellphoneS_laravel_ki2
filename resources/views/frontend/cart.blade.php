@extends('frontend.layout')
@section('titleMain')
    <title>CellPhoneXSMAX - Cast</title>
@endsection
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .btnEnd{
            margin-top: 20px;
        }
        .btnEnd button{
            padding-left: 10px;
        }
        .btnEnd button[type=submit]{
            background-color:paleturquoise;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
    {{--thong tin gio hang--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th>Action</th>
                        <th>X</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalPrice = 0;
                    ?>
                    @foreach ($shoppingCart as $item)
                        <?php
                        if (isset($item)) {
                            $totalPrice += $item->price * $item->quantity;
                        }
                        ?>
                        <tr>
                            <td class="col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                                                                  src="{{$item->thumbnail}}"
                                                                                  style="width: 72px; height: 72px;">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">{{$item->name}}</a></h4>
                                        <h5 class="media-heading"> by <a href="#">{{$item->brand}}</a></h5>
                                    </div>
                                </div>
                            </td>
                            <form action="/cart/update?id={{$item->id}}" method="POST">
                                @csrf
                                <td class="col-md-1" style="text-align: center">
                                    <input name="quantity" type="number" class="form-control" id="exampleInputEmail1"
                                           value="{{$item->quantity}}">
                                </td>
                                <td class="col-md-1 text-center"><strong>{{$item->price}} USD</strong></td>
                                <td class="col-md-1 text-center"><strong>{{$item->price * $item->quantity}} USD</strong>
                                </td>
                                <td class="col-md-1">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-upload"></span> Update
                                    </button>
                                </td>
                            </form>
                            <td>
                                <form action="/cart/remove?id={{$item->id}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{$totalPrice}} USD</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>Updating...</strong></h5></td>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{$totalPrice}} USD</strong></h3></td>
                    </tr>
                    </tbody>
                </table>
                {{--                thong tin gui don hang--}}
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-12 clearfix">
                            <div class="bill-to">
                                <div class="form-one">
                                    <form action="/oder/process" method="post">
                                        @csrf
                                        <input type="text" name="shipEmail" placeholder="Email">
                                        <input type="text" name="shipName" placeholder="Họ và tên">
                                        <input type="text" name="shipAddress" placeholder="Địa chỉ">
                                        <input type="text" name="shipPhone" placeholder="Phone">
                                        <textarea name="shipNote" placeholder="Ghi chú đơn hàng của bạn"
                                                  rows="16"></textarea>
                                        <div class="btnEnd">
                                            <button type="button" class="btn btn-default">
                                                <a href="/home"><span class="glyphicon glyphicon-shopping-cart"></span>
                                                    Continue
                                                    Shopping</a>
                                            </button>
                                            <button type="button" class="btn btn-success">
                                                Checkout <span class="glyphicon glyphicon-play"></span>
                                            </button>
                                            <button type="submit" class="btn btn-default">
                                                Submit Order <span class="glyphicon glyphicon-play"></span>
                                            </button>
                                        </div>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

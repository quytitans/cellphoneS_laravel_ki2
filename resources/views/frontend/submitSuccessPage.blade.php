@extends('frontend.layout')
@section('titleMain')
    <title>CellPhoneXSMAX - Cast</title>
@endsection
@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    {{--thong tin gio hang--}}
    <div class="container">
        <div class="row">
           <h1>Lưu thông tin đơn hàng thành công</h1>
            <h3>Mã đơn hàng: {{$order->id}}</h3>
            <h3>Tổng số tiền phải thanh toán: {{$order->totalPrice}}</h3>
            <h2>Thông tin giao hàng:</h2>
            <h3>Email: {{$order->shipEmail}}</h3>
            <h3>Số điện thoại: {{$order->shipPhone}}</h3>
            <h3>Địa chỉ nhận hàng: {{$order->shipAddress}}</h3>
        </div>
    </div>
@endsection

@extends('admin.layout.master-layout')

@section('title')
    <title>Form</title>
    <style>
        .mainMenu{
            vertical-align: middle
        }
    </style>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>HOT NEWS ---> batdongsanquynguyen.com.vn</h2>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($apartments as $apartment)
                <div class="col-md-4 float-left ml-2">
                    <img class="img-thumbnail" src="{{$apartment->thumbnail}}" alt="">
                    <h3 class="thumb-info-title">{{$apartment->name}}</h3>
                    <p class="info-title">{{$apartment->information}}</p>
                    <h4 class="info-title">@if($apartment->status==1)
                            Đang bán
                        @endif
                        @if($apartment->status==2)
                            Đã bán
                        @endif
                        @if($apartment->status==3)
                            Tin đăng hết hạn
                        @endif
                    </h4>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        @if ($apartments->lastPage() > 1)
            <ul class="pagination">
                <li class="{{ ($apartments->currentPage() == 1) ? ' disabled' : '' }}">
                    <a href="{{ $apartments->url(1) }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $apartments->lastPage(); $i++)
                    <li class="{{ ($apartments->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $apartments->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="{{ ($apartments->currentPage() == $apartments->lastPage()) ? ' disabled' : '' }}">
                    <a href="{{ $apartments->url($apartments->currentPage()+1) }}">Next</a>
                </li>
            </ul>
        @endif
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection

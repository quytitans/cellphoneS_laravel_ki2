@extends('admin.layout.master-layout')

@section('title')
    <title>Detail information</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Detail information</h2>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/mobiles/edit?id={{$item->id}}" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">DETAIL</h2>
                </header>
                <div class="panel-body">
                    @if($errors->all())
                        <div class="validation-message">
                            <ul style="display: block;">
                                @foreach($errors->all() as $error)
                                    <li>
                                        <label class="error">
                                            {{$error}}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Name</label>
                            <h1>{{$item->name}}</h1>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Thumbnail</label>
                            <div id="previewIMG">

                                @foreach($item->ArrayThumbnail as $thumbnail)
                                    <img width="100" class="img-rounded" src="{{$thumbnail}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Brand</label>
                            <h3>{{$item->brandID}}</h3>
                        </div>
                        <div class="col-lg-3">
                            <label>Type</label>
                            <h3>{{$item->typeID}}</h3>
                        </div>
                        <div class="col-lg-3">
                            <label>RAM</label>
                            <h3>{{$item->ramID}} GB</h3>
                        </div>
                        <div class="col-lg-3">
                            <label>CPU</label>
                            <h3>{{$item->cpu}}</h3>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>SSD</label>
                            <h3>{{$item->ssdID}} GB</h3>
                        </div>
                        <div class="col-lg-4">
                            <label>Screen size</label>
                            <h3>{{$item->screenID}} inch</h3>
                        </div>
                        <div class="col-lg-4">
                            <label>Status</label>
                            <h3>{{$item->status}}</h3>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <a href="/mobiles/all">
                        <button type="button" class="btn btn-primary pull-right">Back</button>
                    </a>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var previewIMG = document.getElementById('previewIMG')
        var thumbnailURL = document.getElementById('thumbnailURL')
        var myWidget = cloudinary.createUploadWidget({
                cloudName: 'quynv300192',
                uploadPreset: 'qivdh8qo'
            }, function (error, result) {
                if (!error && result && result.event === "success") {
                    thumbnailURL.value += `${result.info.secure_url}` + ',';
                    console.log(thumbnailURL.value);
                    previewIMG.innerHTML += `
                        <button type="button" class="btn-xs">X</button>
                        <img class="img-thumbnail img-rounded" width="100" id="imgthumnail" src="${result.info.secure_url}" alt="">`
                    console.log(result.info)
                }
            }
        )
        document.getElementById("upload_widget").addEventListener("click", function () {
            myWidget.open();
        }, false);
    </script>
@endsection

@extends('admin.layout.master-layout')

@section('title')
    <title>Change information</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Edit infomation</h2>
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
                    <h2 class="panel-title">UPDATE</h2>
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
                            <input type="text" class="form-control" name="name" value="{{$item->name}}">
                            @error('name')
                            <label for="eventName" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Brand</label>
                            <select class="form-control" name="brandID">
                                @foreach($brands as $brand)
                                    <option value={{$brand->id}} {{$item->brandID == $brand->id ? 'selected' : ''}}>{{$brand->name}} </option>
                                @endforeach
                            </select>
                            @error('brandID')
                            <label for="bandNames" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" value="{{$item->price}}">
                            @error('price')
                            <label for="portfolio" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Type</label>
                            <select class="form-control" name="typeID">
                                <option value="" selected>---select---</option>
                                <option value="IOS" {{$item->typeID == 'IOS' ? 'selected' : ''}}>IOS</option>
                                <option value="android" {{$item->typeID == 'android' ? 'selected' : ''}}>android</option>
                            </select>
                            @error('typeID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>RAM</label>
                            <select class="form-control" name="ramID">
                                <option value="" selected>---select---</option>
                                <option value="2" {{$item->ramID == 2 ? 'selected' : ''}}>2 MB</option>
                                <option value="4" {{$item->ramID == 4 ? 'selected' : ''}}>4 MB</option>
                                <option value="8" {{$item->ramID == 8 ? 'selected' : ''}}>8 MB</option>
                                <option value="16" {{$item->ramID == 16 ? 'selected' : ''}}>16 MB</option>
                                <option value="32" {{$item->ramID == 32 ? 'selected' : ''}}>32 MB</option>
                            </select>
                            @error('ramID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>CPU</label>
                            <input type="text" class="form-control" name="cpu" value="{{$item->cpu}}">
                            @error('cpu')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>SSD</label>
                            <select class="form-control" name="ssdID">
                                <option value="" selected>---select---</option>
                                <option value="16" {{$item->ssdID == 16 ? 'selected' : ''}}>16 MB</option>
                                <option value="32" {{$item->ssdID == 32 ? 'selected' : ''}}>32 MB</option>
                                <option value="64" {{$item->ssdID == 64 ? 'selected' : ''}}>64 MB</option>
                                <option value="128" {{$item->ssdID == 128 ? 'selected' : ''}}>128 MB</option>
                                <option value="256" {{$item->ssdID == 256 ? 'selected' : ''}}>256 MB</option>
                                <option value="512" {{$item->ssdID == 512 ? 'selected' : ''}}>512 MB</option>
                                <option value="1024" {{$item->ssdID == 1024 ? 'selected' : ''}}>1024 MB</option>
                            </select>
                            @error('ssdID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Screen size</label>
                            <input type="number" class="form-control" name="screenID" value="{{$item->screenID}}">
                            @error('screenID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Thumbnail</label>
                            <input id="thumbnailURL" type="hidden" class="form-control" name="thumbnail" value="{{$item->thumbnail}}">
                            <button id="upload_widget" class="form-control btn-default" type="button">Select mobile
                                image
                            </button>
                            <div id="previewIMG">

                                    @foreach($item->ArrayThumbnail as $thumbnail)
                                        <img width="100" class="img-rounded" src="{{$thumbnail}}" alt="">
                                    @endforeach

                            </div>
                            @error('screenID')
                            <label for="thumbnail" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{$item->status == 1 ? 'selected' : ''}}>Sắp về hàng</option>
                                <option value="2" {{$item->status == 2 ? 'selected' : ''}}>Đang bán</option>
                                <option value="3" {{$item->status == 3 ? 'selected' : ''}}>Hết hàng</option>
                                <option value="4" {{$item->status == 4 ? 'selected' : ''}}>Nhận pre-order</option>
                            </select>
                            @error('status')
                            <label for="status" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Submit</button>
                    <a href="/home">
                        <button type="button" class="btn btn-danger pull-right">Cancel</button>
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

@extends('admin.layout.master-layout')

@section('title')
    <title>Create new mobile</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Add new moblie</h2>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/mobiles/create" method="post">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                    </div>
                    <h2 class="panel-title">Create</h2>
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
                            <input type="text" class="form-control" name="name" placeholder="name">
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
                                    <option value={{$brand->id}}>{{$brand->name}}</option>
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
                            <input type="number" class="form-control" name="price" placeholder="price">
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
                                <option value="IOS">IOS</option>
                                <option value="android">android</option>
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
                                <option value="2">2 MB</option>
                                <option value="4">4 MB</option>
                                <option value="8">8 MB</option>
                                <option value="16">16 MB</option>
                                <option value="32">32 MB</option>
                            </select>
                            @error('ramID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>CPU</label>
                            <input type="text" class="form-control" name="cpu" placeholder="cpu">
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
                                <option value="16">16 MB</option>
                                <option value="32">32 MB</option>
                                <option value="64">64 MB</option>
                                <option value="128">128 MB</option>
                                <option value="256">256 MB</option>
                                <option value="512">512 MB</option>
                                <option value="1024">1024 MB</option>
                            </select>
                            @error('ssdID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Screen size</label>
                            <input type="number" class="form-control" name="screenID" placeholder="screen size">
                            @error('screenID')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Thumbnail</label>
                            <input id="thumbnailURL" type="hidden" class="form-control" name="thumbnail" value="">
                            <button id="upload_widget" class="form-control btn-default" type="button">Select mobile
                                image
                            </button>
                            <div id="previewIMG"></div>
                            @error('screenID')
                            <label for="thumbnail" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Sắp về hàng</option>
                                <option value="2">Đang bán</option>
                                <option value="3">Hết hàng</option>
                                <option value="4">Nhận pre-order</option>
                            </select>
                            @error('status')
                            <label for="status" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Submit</button>
                    <a href="/mobiles/all">
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

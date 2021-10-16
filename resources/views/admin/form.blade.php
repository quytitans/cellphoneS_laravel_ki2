@extends('admin.layout.master-layout')

@section('title')
    <title>Form</title>
@endsection

@section('breadcrumb')
    <header class="page-header">
        <h2>Add new news</h2>
    </header>
@endsection

@section('content')
    <div class="col-md-12">
        <form name="register-form" action="/create" method="post">
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
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="address">
                            @error('address')
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
                            <label>Information</label>
                            <input type="text" class="form-control" name="information" placeholder="information">
                            @error('information')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Information Detail</label>
                            <input type="textfield" class="form-control "  name="informationDetail"
                                   placeholder="information detail">
                            @error('informationDetail')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label>Thumbnail</label>
                            <input type="url" class="form-control" name="thumbnail" placeholder="thumbnail">
                            @error('thumbnail')
                            <label for="ticketPrice" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Chưa bán</option>
                                <option value="2">Đã bán</option>
                                <option value="3">Hết thời gian đăng bán</option>
                            </select>
                            @error('status')
                            <label for="status" class="error">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button type="submit" class="btn btn-info btn-fill">Submit</button>
                    <a href="/apartments">
                        <button type="button" class="btn btn-danger pull-right">Cancel</button>
                    </a>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('script')
@endsection

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
    <form id="formSubmit">
        @csrf
        <div class="row">
            <div id="" class=" col-lg-2"><label>Number of display<Select name="numberDisplay" class="form-control">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </Select></label>
            </div>
            <div id="" class="col-lg-2">
                <label>Start Date<input name="start_date" type="date"
                                        class="form-control"
                                        placeholder="Search"
                                        aria-controls="datatable-editable"></label>
                <label>End Date<input name="end_date" type="date"
                                      class="form-control"
                                      placeholder="Search"
                                      aria-controls="datatable-editable"></label>

            </div>
            <div id="" class="col-lg-2">
                <label>Price from<input name="from_price" type="number"
                                        class="form-control"
                                        aria-controls="datatable-editable"></label>
                <label>Price to<input name="to_price" type="number"
                                      class="form-control"
                                      aria-controls="datatable-editable"></label>

            </div>
            <div id="ramID" class=" col-lg-2"><label>RAM<Select name="ramID" class="form-control">
                        <option value="" selected>---select---</option>
                        <option value="2">2 BG</option>
                        <option value="4">4 BG</option>
                        <option value="8">8 BG</option>
                        <option value="16">16 BG</option>
                        <option value="32">32 BG</option>
                    </Select></label>
            </div>
            <div id="" class=" col-lg-2"><label>Brand
                    <Select id="brandID" name="brandID" class="form-control ">
                        <option value="" selected>---select---</option>
                        @foreach($brands as $brand)
                            <option value={{$brand->id}}>{{$brand->name}}</option>
                        @endforeach
                    </Select>
                </label>
            </div>
            <div id="" class=" col-lg-2"><label>Search key word<input name="keyword" type="search"
                                                                      class="form-control col-lg-12"
                                                                      placeholder="Search"
                                                                      aria-controls="datatable-editable"></label>
            </div>
        </div>
        <div class="form-row">
            <button type="reset" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Refresh
            </button>
            <button id="btnSearch" type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Search</button>
        </div>
    </form>
    {{--    trien khai thong tin tra ve--}}
    <div id="data_table">
        @include('admin.renderTable')
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#btnSearch').click(function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: '/mobiles/search',
                    data: $('#formSubmit').serialize(),
                    success: function (data) {
                        $('#data_table').html(data)
                    }
                })
            })

            $(document).on('click', '.pagination a', function (event) {
                event.preventDefault();
                const page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            })

             function fetch_data(page) {
                $.ajax({
                    url: '/mobiles/fetch_data?page=' + page,
                    data: $('#formSubmit').serialize(),
                    success: function (data) {
                        $('#data_table').html(data);
                    }
                })
            }
        })
    </script>
@endsection

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
    <table class="table mb-none">
        <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Thumbnail</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Type</th>
            <th>RAM</th>
            <th>CPU</th>
            <th>SSD</th>
            <th>Screen size</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    @foreach($item->ArrayThumbnail as $thumbnail)
                        <img width="100" class="img-rounded" src="{{$thumbnail}}" alt="">
                    @endforeach
                </td>
                <td>{{$item->brandName->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->typeID}}</td>
                <td>{{$item->ramID}} GB</td>
                <td>{{$item->cpu}}</td>
                <td>{{$item->ssdID}} GB</td>
                <td>{{$item->screenID}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    @if($item->status == 1)
                        Hàng sắp về
                    @endif
                    @if($item->status == 2)
                        Đang bán
                    @endif
                    @if($item->status == 3)
                        Hết hàng
                    @endif
                    @if($item->status == 4)
                        Nhận Pre-Order
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @php
        $link_limit = 7;
    @endphp
    @if ($items->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ ($items->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $items->url(1) }}">First</a>
            </li>
            @if($items->currentPage() > 1)
                <li>
                    <a href="{{ $items->url($items->currentPage() - 1) }}">Previous</a>
                </li>
            @endif
            @for ($i = 1; $i <= $items->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $items->currentPage() - $half_total_links;
                $to = $items->currentPage() + $half_total_links;
                if ($items->currentPage() < $half_total_links) {
                    $to += $half_total_links - $items->currentPage();
                }
                if ($items->lastPage() - $items->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($items->lastPage() - $items->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="{{ ($items->currentPage() == $i) ? ' active' : '' }}">
                        <a href="{{ $items->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            @if($items->currentPage() < $items->lastPage())
                <li>
                    <a href="{{ $items->url($items->currentPage() + 1) }}">Next</a>
                </li>
            @endif
            <li class="{{ ($items->currentPage() == $items->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $items->url($items->lastPage()) }}">Last</a>
            </li>
        </ul>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#btnSearch').click(function (event) {
                event.preventDefault;
                $.ajax({
                    type: 'post',
                    url: '/mobiles/search',
                    data: $('#formSubmit').serialize(),
                    success: function (data) {
                        $('tbody').html(data)
                    }
                })
            })
        });
    </script>
@endsection

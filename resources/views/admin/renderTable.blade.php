<div class="table-responsive">
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
            <th>Action</th>
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
                <td>{{$item->ssdID}}</td>
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
                <td>
                    <a href="/mobiles/detail?id={{$item['id']}}" ><i class="fa fa-info m2"></i> Info</a>
                    <a href="/mobiles/edit?id={{$item['id']}}" ><i class="fa fa-pencil">  </i> Edit</a>
                    <a href="/mobiles/delete?id={{$item['id']}}" class="on-default ">  <i class="fa fa-trash-o"></i> Delete</a>
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
</div>

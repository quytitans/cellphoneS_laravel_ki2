<?php
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($mobiles->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($mobiles->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $mobiles->url(1) }}">First</a>
        </li>
        @if($mobiles->currentPage() > 1)
            <li>
                <a href="{{ $mobiles->url($mobiles->currentPage() - 1) }}">Previous</a>
            </li>
        @endif
        @for ($i = 1; $i <= $mobiles->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $mobiles->currentPage() - $half_total_links;
            $to = $mobiles->currentPage() + $half_total_links;
            if ($mobiles->currentPage() < $half_total_links) {
                $to += $half_total_links - $mobiles->currentPage();
            }
            if ($mobiles->lastPage() - $mobiles->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($mobiles->lastPage() - $mobiles->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($mobiles->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $mobiles->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if($mobiles->currentPage() < $mobiles->lastPage())
            <li>
                <a href="{{ $mobiles->url($mobiles->currentPage() + 1) }}">Next</a>
            </li>
        @endif
        <li class="{{ ($mobiles->currentPage() == $mobiles->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $mobiles->url($mobiles->lastPage()) }}">Last</a>
        </li>
    </ul>
@endif

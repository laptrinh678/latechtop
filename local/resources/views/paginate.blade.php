<div id="phantrang" class="phantrang_news" style="text-align: right; padding: 10px 0; width: 100%;">
    @if ($paginator->hasPages())
    Đến trang
    <ul id="yw0" class="yiiPager">
        @if ($paginator->onFirstPage())
        <li class="previous hidden"><a href="{{ $paginator->previousPageUrl() }}">&lt; Trước</a></li>
        @else
            <li class="previous hidden"><a href="{{ $paginator->previousPageUrl() }}">&lt; Trước</a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page selected"><a href="{{ $url }}">{{ $page }}</a></li>
                    @else

                <li class="page"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li class="next"><a href="{{ $paginator->nextPageUrl() }}">Tiếp theo &gt;</a></li>
        @endif
    </ul>
    @endif
</div>


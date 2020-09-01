@if ($paginator->hasPages())
    <div class="page">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!--<div class="page-item transition500"><a ajax_href="javascript:;">第一页</a></div>-->
        @else
            <div class="page-item page-prev transition500"><a ajax_href="{{ $paginator->previousPageUrl() }}"><</a></div>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="page-item transition500"><a ajax_href="javascript:;">{{ $element }}</a></div>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="page-item transition500 active"><a ajax_href="javascript:;">{{ $page }}</a></div>
                    @else
                        <div class="page-item transition500 "><a ajax_href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="page-item page-next  transition500"><a ajax_href="{{ $paginator->nextPageUrl() }}">></a></div>
        @else
            <!--<div class="page-item  transition500"><a ajax_href="javascript:;">最后一页</a></div>-->
        @endif
    </div>
@endif

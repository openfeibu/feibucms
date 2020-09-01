@if ($paginator->hasPages())
    <div class="page">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <!--<div class="page-item transition500"><a href="javascript:;">第一页</a></div>-->
        @else
            <div class="page-item page-prev transition500"><a href="{{ $paginator->previousPageUrl() }}"><</a></div>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="page-item transition500 "><a href="javascript:;">{{ $element }}</a></div>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="page-item transition500 active"><a href="javascript:;">{{ $page }}</a></div>
                    @else
                        <div class="page-item transition500 "><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="page-item page-next  transition500"><a href="{{ $paginator->nextPageUrl() }}">></a></div>
        @else
            <!--<div class="page-item  transition500"><a href="javascript:;">最后一页</a></div>-->
        @endif
    </div>
@endif

<!--
<div class="page">
    <div class="page-item page-prev transition500"><a href="#"><</a></div>
    <div class="page-item transition500 active"><a href="#">1</a></div>
    <div class="page-item transition500"><a href="#">2</a></div>
    <div class="page-item transition500"><a href="#">3</a></div>
    <div class="page-item transition500"><a href="#">4</a></div>
    <div class="page-item transition500"><a href="#">5</a></div>
    <div class="page-item page-next transition500"><a href="#">></a></div>

</div>
-->
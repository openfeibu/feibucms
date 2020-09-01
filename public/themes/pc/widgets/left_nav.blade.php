
    <div class="main-nav-title">标本馆导航</div>
    <div class="main-nav-list fb-clearfix">
        @foreach($navs as $key => $item)
            <div class="main-nav-item {{ active_class($item->active) }}"><a href="{{ $item->url }}">{{ $item->name }}</a></div>
        @endforeach
    </div>

<div class="page-title clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">

    @if(isset($nav))
        <div class="page-title-c pull-left">
            <span>{{ $nav->name }}</span>
        </div>
        <div class="page-title-e pull-left">
            <span>/</span>{{ $nav->en_name }}
        </div>
    @endif
    <div class="tab pull-right">
        @foreach($nav_tabs as $key => $nav_item)
            <div class="tab-item pull-left @if($nav_item->id == $nav->id)active @endif"><a href="{{ $nav_item->url }}">{{ $nav_item->name }}</a></div>
        @endforeach
    </div>
</div>
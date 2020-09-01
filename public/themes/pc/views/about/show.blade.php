
<!-- 内容 -->
<div class="main">
    <div class="container w1400">

        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}

        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            {!! $page->content !!}
        </div>

    </div>
</div>
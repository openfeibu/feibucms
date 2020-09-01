
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}
        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="course">
                @foreach($courses as $key => $course)
                <div class="course-item">
                    <div class="time">{{ $course['year'] }}年{{ $course['month'] ? $course['month'].'月' : '' }}</div>
                    <div class="con">{!! $course['description'] !!}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
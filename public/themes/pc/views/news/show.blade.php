
<!-- 内容 -->
<div class="main ">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}

        <div class="news-detail clearfix">
            <div class="news-detail-title  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">{{ $news->title }}</div>
            <div class="news-detail-left pull-left  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="news-detail-date">{{ $news->created_at->format('Y-m-d') }}</div>
                <div class="news-detail-c">
                    {!! $news->content !!}
                </div>
                <div class="news-page">
                    @if($previous)
                    <div class="news-prev col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                        <a href="{{ route('pc.news.show',$previous->id) }}">上一篇：{{ get_substr($previous->title,45) }}</a>
                    </div>
                    @endif
                    @if($next)
                    <div class="news-next col-lg-6 col-md-6 col-sm-12 col-xs-12 nopadding">
                        <a href="{{ route('pc.news.show',$next->id) }}">下一篇：{{ get_substr($next->title,45) }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="news-detail-right pull-right  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="news-detail-right-t">新闻推荐</div>
                <div class="news-detail-right-c">
                    @foreach($hot_recommend_news as $key => $news_item)
                    <div class="news-detail-right-c-item clearfix">
                        <a class="clearfix" href="{{ route('pc.news.show',$news_item->id) }}">
                            <div class="img"><img class="transition500" src="{{ $news_item->image_url }}" alt=""></div>
                            <div class="test">
                                <p class="fb-overflow-2">{{ get_substr($news_item->title,50) }}</p>
                                <span>{{ $news_item->created_at->format('Y-m-d') }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

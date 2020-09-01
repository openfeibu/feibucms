
<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        <div class="news-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">

            @foreach($news as $key => $news_item)
                @if($key == 0 && Request::get('page','1') == 1 && $news_item->hot_recommend)
                    <div class="page-news-big-item clearfix col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('pc.news.show',$news_item->id) }}" class="clearfix">
                            <div class="img pull-left"><img class="transition500" src="{{ $news_item->image_url }}" alt=""></div>
                            <div class="test">
                                <div class="title transition500"> {{ $news_item->title }}</div>
                                <div class="date">{{ $news_item->created_at->format('Y-m-d') }}</div>
                                <div class="con fb-overflow-3">{{ $news_item->description }}</div>
                                <div class="btn">了解更多</div>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="page-news-item clearfix col-lg-11 col-md-11 col-sm-12 col-xs-12">
                        <a href="{{ route('pc.news.show',$news_item->id) }}" class="clearfix">
                            <div class="img "><img class="transition500" src="{{ $news_item->image_url }}" alt=""></div>
                            <div class="test">
                                <div class="title transition500 fb-overflow-2">
                                    {{ $news_item->title }}
                                </div>
                                <div class="date">{{ $news_item->created_at->format('Y-m-d') }}</div>

                                <div class="con fb-overflow-2">{{ $news_item->description }}</div>
                                <div class="btn">了解更多</div>
                            </div>
                        </a>
                    </div>
                @endif


            @endforeach



        </div>
        {!! $news->appends(['search_key' => $search_key])->links('common.pagination') !!}


    </div>
</div>

<div class="banner">
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
            @foreach($banners as $key => $banner_item)
                <div class="swiper-slide"><a href="@if($banner_item['url']){{ $banner_item['url'] }}@else javascript:;@endif"><img src="{{ url('image/original/'.$banner_item['image']) }}" width="100%" alt=""></a></div>
            @endforeach

        </div>
        <div class="swiper-pagination swiper-pagination-banner"></div>
    </div>
</div>
<!-- 关于我们 -->
<div class="about">
    <div class="container w1400">
        <div class="about-left col-lg-6 col-md-6 col-sm-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <a href="{{ setting('vr') }}" target="_blank">
                <img class="transition" src="{!! theme_asset('images/vrBg.png') !!}" alt="" />
                <div class="vr-text" >
                    <div class="img animated fb-bounceIn " style='animation-iteration-count: infinite;'><img src="{!! theme_asset('images/VR.png') !!}" alt=""></div>
                    <span>溢多利集团720°全景展示</span>
                </div>
            </a>
        </div>
        <div class="about-right col-lg-6 col-md-6 col-sm-12">
            <div class="con-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <span class="transition500">About VTR</span>
                <h1>广东溢多利生物科技股份有限公司</h1>
            </div>
            <div class="about-con  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                广东溢多利生物科技股份有限公司成立于1991年，总部位于广东省珠海市。公司专注于生物工程领域，围绕生物医药和生物农牧两大产业，研发并形成了生物酶制剂、甾体激素原料药、功能性饲料添加剂三大系列产品线，同时为行业客户持续提供整体生物技术解决方案，是我国生物酶制剂行业首家上市企业，全球极具竞争力的甾体激素医药企业。
            </div>
            <ul class="about-icon wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s">
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/about/profile">
                        <img class="transition500" src="{!! theme_asset('images/i1.png') !!}" alt="">
                        <p>企业概况</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/about/profile/170">
                        <img class="transition500" src="{!! theme_asset('images/i3.png') !!}" alt="">
                        <p>产业布局</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/course/development_course">
                        <img class="transition500" src="{!! theme_asset('images/i4.png') !!}" alt="">
                        <p>发展历程</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/course/enterprise_honor">
                        <img class="transition500" src="{!! theme_asset('images/i5.png') !!}" alt="">
                        <p>企业荣誉</p>
                    </a>
                </li>
                <li class="col-lg-1-5 col-md-1-5 col-sm-1-5 col-xs-1-5">
                    <a href="/news_center/video">
                        <img class="transition500" src="{!! theme_asset('images/i2.png') !!}" alt="">
                        <p>宣传视频</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- 研发创新 -->
<div class="innovate">
    <div class="innovate-bg">
        <div class="container w1400">
            <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <span  class="transition500">INNOVATE</span>
                <h1>研发创新</h1>
            </div>
            <div class="innovate-con">
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".4s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">国家认定企业技术中心</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">院士工作站</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.6s">
                    <div class="number">
                        <span >1</span>所
                    </div>
                    <div class="name">博士后科研工作站</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.7s">
                    <div class="number">
                        <span >10</span>所
                    </div>
                    <div class="name">省级工程中心</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.8s">
                    <div class="number">
                        <span >4</span>项
                    </div>
                    <div class="name">专有技术</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="0.9s">
                    <div class="number">
                        <span >11</span>项
                    </div>
                    <div class="name">核心技术</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="1s">
                    <div class="number">
                        <span >174</span>项
                    </div>
                    <div class="name">发明专利</div>
                </div>
                <div class="innovate-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay="1.1s">
                    <div class="number">
                        <span >300+</span>名
                    </div>
                    <div class="name">研发人员</div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- 新闻中心 -->
<div class="new">
    <div class="container w1400">
        <div class="con-title tip-title  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span  class="transition500">NEW</span>
            <h1>新闻中心</h1>
        </div>
        <div class="new-con clearfix">
            @foreach(app('page_repository')->where('category_id',1)->where('home_recommend',1)->orderBy('created_at','desc')->limit(5)->get() as $key => $news)
            @if($key == 0)
                <div class="new-left col-lg-6 col-md-6 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                    <div class="new-big-item transition500">
                        <a href="{{ route('pc.news.show',$news->id) }}">
                            <div class="img"><img class="transition500" src="{!! $news->image_url !!}" alt=""></div>
                            <div class="test">
                                <div class="title fb-overflow-2 transition500">{{ $news->title }}</div>
                                <div class="des">
                                    <div class="date">{{ $news->created_at->format('Y-m-d') }}</div>
                                    <div class="more"><span>阅读详情</span></div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            @endif
            @endforeach
            <div class="new-right col-lg-6 col-md-6 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                @foreach(app('page_repository')->where('category_id',1)->where('home_recommend',1)->orderBy('created_at','desc')->limit(5)->get() as $key => $news)
                    @if($key != 0)
                    <div class="new-item transition500 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <a href="{{ route('pc.news.show',$news->id) }}">
                            <div class="img"><img class="transition500"  src="{!! $news->image_url !!}" alt=""></div>
                            <div class="title transition500 ">
								<div class="t-name  fb-overflow-2">{{ $news->title }}</div>
							</div>

                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        var mySwiper = new Swiper('.swiper-container-banner', {
            loop: true,
            autoplay: 6000,
    
            pagination: '.swiper-pagination-banner',
            paginationClickable :true
        })
    })
</script>
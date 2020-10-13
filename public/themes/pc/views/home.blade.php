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
           
				<video id="fbVideo" controls src="{!! theme_asset('images/video.mp4') !!}" poster="{!! theme_asset('images/videoBg.jpg') !!}" ></video>
				
              
        </div>
        <div class="about-right col-lg-6 col-md-6 col-sm-12">
            <div class="con-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <span class="transition500">About FeiBu</span>
                <h1>广州飞步信息科技有限公司</h1>
            </div>
            <div class="about-con  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                广州飞步信息科技有限公司，成立于2016年，公司专注于互联网产品开发及计算机网系统工程服务。在信息化时代日渐成熟的同时，我们敢于创新，不断前行。依托珠三角地区庞大、前沿的教育环境，公司致力研发符合相关单位使用的各大中小型系统及便民论坛。其中“三二分段招生系统”于2016年开发并获得相关软件著作权。本系统是完全按照广东省教育厅高职衔接三二分段招生业务而展开的，面向高职院校，对口中职老师及同学使用。
            </div>
			<div class="more wow fadeInUp animated" data-wow-duration="1s" data-wow-delay=".5s"><a href="#">MORE</a></div>
        </div>
    </div>
</div>
<!-- an li -->
<div class="case">
    <div class="case-bg">
        <div class="container w1400">
            <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <span  class="transition500">CASE</span>
                <h1>案例中心</h1>
            </div>
            <div class="page-product-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                @foreach(app('page_repository')->whereIn('category_id',$case_category_ids)->where('home_recommend',1)->orderBy('created_at','desc')->limit(8)->get() as $key => $case)
					<div class="page-product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
						<a href="#" target="_blank">
							<div class="img "><img class="transition500" src="{!! $case->image_url !!}" alt=""></div>
							<div class="test transition">

								<div class="title fb-overflow-1">
									{{ $case->title }}
								</div>

							</div>
						</a>
					</div>
                 @endforeach
			</div>
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
                    <div class="name"></div>
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
<!-- an li -->
<div class="case">
    <div class="case-bg">
        <div class="container w1400">
            <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <span  class="transition500">PARTNERS</span>
                <h1>合作伙伴</h1>
            </div>
            <div class="page-product-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                @foreach(app('link_repository')->orderBy('order','asc')->orderBy('id','asc')->limit(8)->get() as $key => $link)
                    <div class="page-product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <a href="#" target="_blank">
                            <div class="img "><img class="transition500" src="/image/original/{!! $link->image !!}" alt=""></div>
                            <div class="test transition">

                                <div class="title fb-overflow-1">
                                    {{ $link->name }}
                                </div>

                            </div>
                        </a>
                    </div>
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
		$(".fbVideo-btn").on("click",function(){
			$("#fbVideo")[0].play();
			$(this).hide();
		})
    })
</script>
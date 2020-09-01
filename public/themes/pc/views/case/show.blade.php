<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        <div class="pro-detail-con">
            <div class="pro-detail-con-t clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="pro-detail-img pull-left ">
                    <div class="swiper-container swiper-container-pro">
                        <div class="swiper-wrapper">
                            @foreach($product->images as $key => $image)
                            <div class="swiper-slide">
                                <a href="{{ '/image/original'.$image }}"><img src="{{ '/image/original'.$image }}" width="100%"></a>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination swiper-pagination-pro"></div>
                    </div>
                </div>
                <div class="pro-detail-test">
                    <div class="pro-title">{{ $product->title }}</div>
                    <div class="pro-des">{{ $product->description }}</div>
                    <div class="pro-btn clearfix">
                        @if($product->vid)
                        <div class="btn-video transition page-news-video" vid = "{{ $product->vid }}" des="{{ $product->description }}">产品视频</div>
                        @endif
                        @if($product->instruction)
                        <div class="btn-dz transition"><a href="{{ '/image/original'.$product->instruction }}" target="_blank">电子说明书</a></div>
                        @endif
                        @if(count($academic_reports))
                        <div class="btn-bg transition"><a href="{{ route('pc.academic_report') }}?product_id={{ $product->id }}" target="_blank">学术报告</a></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="pro-detail-con-c clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="pro-detail-con-c-left pull-left">
                    <div class="parameter clearfix">
                        @if($product->parameters)
                        <div class="parameter-t">产品参数：</div>
                        <ul>
                            @foreach($product->parameters as $name => $parameter)
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">{{ $name }}：{{ $parameter }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="pro-detail-detail">
                        {!! $product->content !!}
                    </div>
                </div>
                <div class="news-detail-right pull-right">
                    <div class="news-detail-right-t">相关产品</div>
                    <div class="news-detail-right-c">
                        @foreach($related_products as $key => $product)
                        <div class="news-detail-right-c-item clearfix">
                            <a class="clearfix" href="{{ route('pc.product.show',$product->id) }}">
                                <div class="img"><img class="transition500" src="{{ '/image/original'.$product->image }}" alt=""></div>
                                <div class="test">
                                    <p class="fb-overflow-2">{{ $product->title }}</p>
                                    <span>{{ $product->created_at->format('Y-m-d') }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
{!! Theme::asset()->container('player')->scripts() !!}
<div class="video-detail">
    <div class="video-detail-close"></div>
    <div id="video-detail-con">
        <div class="video-close"></div>
        <div id="playerBox">
            <div id='player'></div>
            <div class="des">这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍</div>
        </div>

    </div>

</div>
<script>
    $(function() {
        var mySwiper = new Swiper('.swiper-container-pro', {
            loop: true,
            autoplay: 6000,
            autoHeight: true,
            pagination: '.swiper-pagination-pro',
            paginationClickable :true
        });

        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click",function(){
            $(".video-detail").fadeOut(200)
        })
        $(".page-news-video").on("click",function(){
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width*0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#player',
                autoplay:false,
                'width':width,
                'height':height,
                'vid' : vid
            });
            $("#playerBox .des").text(des)
        })

    })
</script>

<div class="footer clearfix">
    <div class="footer-con clearfix">
        <div class="container w1400">
            <div class="footer-con-left col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
                <div class="footer-logo"><img  src="{!! theme_asset('images/fblogo.png') !!}" alt=""></div>
                <div class="footer-info">
                    地址：{{ setting('address') }}   <br>
                    电子邮箱： {{ setting('email') }}<br>
                    电话总机：{{ setting('tel') }}  <br>
                    邮政编码：{{ setting('zip_code') }}  <br>
                </div>
            </div>
            <div class="footer-con-right col-lg-8 col-md-8 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')
                {!! $navListPresenter->footer_navs('pc_top') !!}
            </div>

        </div>
        <div class="container w1400">
            <div class="footer-copy clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="pull-left">{!! setting('right') !!} </div>
                <div class="pull-right">技术支持：<a target="_blank" href="http://www.feibu.info">飞步科技</a></div>
            </div>
        </div>
    </div>
	
</div>
<div class="fb-loading">
	<div class="loader-inner ball-clip-rotate-pulse">
			<div></div>
			<div></div>
	</div>
</div>
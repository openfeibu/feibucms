<div id="wap-nav">
    <div class="nav-box transition500">
        <div class="wap-header">
            <span class="wapNav-close icon_close"></span>
            <img src="{{ '/image/original'.setting('logo') }}" alt="Logo" class=" fadeInUp animated"  />
        </div>

        <ul>
            @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

            {!! $navListPresenter->mobile_navs('web_top') !!}
        </ul>
    </div>
</div>
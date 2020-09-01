<ul class="fb-float-left">
    {{--<li class="fb-float-left"><a href="{{ route('pc.home') }}">首页</a></li>--}}
    @foreach($navs as $key => $item)
    <li class="fb-float-left {{ active_class($item->active) }}">
        <a href="{{ $item->url }}">{{ $item->name }}</a>
        @if(isset($item->sub) && count($item->sub) > 0)
        <dl>
            @foreach($item->sub as $sub_key => $sub_item)
            <dd><a href="{{ $sub_item->url }}">{{ $sub_item->name }}</a></dd>
            @endforeach
        </dl>
        @endif
    </li>
    @endforeach
</ul>
<div class="mMenu">
    <div class="mMenu-btn"></div>
    <ol class="fb-float-left">
        <div class="mMenu-title">
            <div class="logo">
                <img src="{!!url("/image/original".setting('logo'))!!}" alt="">
            </div>
            <div class="closeBtn">

            </div>
        </div>
        {{--<li class=""><a href="{{ route('pc.home') }}">首页</a></li>--}}
        @foreach($navs as $key => $item)
        <li class=" {{ active_class($item->active) }}"><a href="{{ $item->url }}">{{ $item->name }}</a></li>
        @endforeach
    </ol>
</div>
<div class="fb-float-right state">

    @auth('user.web')
    <div class="loginSuccess" style="display: block">
        <p><a href="{{ route('pc.user.index') }}">{{ Auth::user()->name }}</a></p>
        <a href="{{ route('pc.logout') }}" class="exitBtn">退出</a>
    </div>
    @endauth
    @guest('user.web')
    <a  class="loginBtn">登录</a>
    <a  class="regBtn">注册</a>
    @endguest


</div>
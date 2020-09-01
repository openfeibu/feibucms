<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>编辑{{ trans("nav.name") }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('nav/nav/'.$nav->id)}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入名称" class="layui-input" value="{{$nav->name}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.en_name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="en_name" autocomplete="off" placeholder="请输入{{ trans('nav.label.en_name') }}" class="layui-input" value="{{$nav->en_name}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.slug') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="slug" autocomplete="off" placeholder="请输入{{ trans('nav.label.slug') }}" class="layui-input"  value="{{$nav->slug}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url"  autocomplete="off" placeholder="请输入{{ trans('nav.label.url') }}" class="layui-input"  value="{{$nav->url}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.image') }}</label>
                        {!! $nav->files('image')
                        ->url($nav->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="{{$nav['order']}}" autocomplete="off" class="layui-input" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>

<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('app.edit') }}{{ trans('page.about.name') }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('page/about/store')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.title') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.title') }}" class="layui-input" >
                        </div>
                    </div>
                <!--<div class="layui-form-item">
                        <label class="layui-form-label">{{  trans('app.video') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="video" lay-verify="title" autocomplete="off" placeholder="请输入{{  trans('app.video') }}" class="layui-input" >
                        </div>
                    </div>-->
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">{{  trans('app.content') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
</script>
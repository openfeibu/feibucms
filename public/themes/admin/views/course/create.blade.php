<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('app.add') }}{{ trans('course.name') }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('course')}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-inline">
                            <textarea name="description"  placeholder="请输入{{ trans('app.description') }}"  class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <!--<div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('course.label.image') }}</label>
                        {!! $course->files('image')
                        ->url($course->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>-->
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.date') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" class="layui-input" id="date" value="{{ date('Y-m') }}">
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date' //指定元素,
            ,type:'month'
            ,value: '{{ date('Y-m') }}'
        });
    });
</script>
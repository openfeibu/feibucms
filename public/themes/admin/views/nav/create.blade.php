<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite>添加{{ trans("nav.name") }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('nav/nav')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* 上级</label>
                        <div class="layui-input-inline">
                            <input type="text" name="parent_id" id="nav_tree" lay-verify="tree" autocomplete="off" placeholder="请选择上级" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* 分类</label>
                        <div class="layui-input-block">
                            @foreach($categories as $key => $category)
                                <input type="radio" name="category_id" value="{{$category['id']}}" title="{{$category['name']}}"  lay-verify="otherReq">
                            @endforeach
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans('nav.label.name') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="请输入{{ trans('nav.label.name') }}" class="layui-input" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.slug') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="slug" autocomplete="off" placeholder="请输入{{ trans('nav.label.slug') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.url') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="url"  autocomplete="off" placeholder="请输入{{ trans('nav.label.url') }}" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('nav.label.image') }}</label>
                        {!! $nav->files('image')
                        ->url($nav->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否菜单</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="is_menu_switch" lay-skin="switch" lay-filter="is_menu_switch" lay-text="菜单|否" value="1" checked>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.order') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" value="0" autocomplete="off" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    var sizes = {};
    layui.use(['treeSelect', 'form', 'layer'], function () {
        var treeSelect= layui.treeSelect,
                form = layui.form,
                $ = layui.jquery,
                layer = layui.layer;

        treeSelect.render({
            elem: '#nav_tree',
            data: '{{ guard_url('nav/nav_tree') }}',
            headers: {},
            type: 'get',
            // 占位符
            placeholder: '请选择上级',
            //多选
            showCheckbox: false,
            //连线
            showLine: true,
            //选中节点(依赖于 showCheckbox 以及 key 参数)。
            //checked: [11, 12],
            //展开节点(依赖于 key 参数)
            spread: [1],
            // 点击回调
            click: function(obj){

            },
            // 加载完成后的回调函数
            success: function (d) {
                console.log(d);
            }
        });
    });
</script>
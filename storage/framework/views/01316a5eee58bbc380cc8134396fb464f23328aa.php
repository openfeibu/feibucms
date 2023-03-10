
<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="index.html">主页</a><span lay-separator="">/</span>
            <a><cite><?php echo Theme::getTitle(); ?></cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="caseadd.html">添加菜单</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                <!--  <div class="layui-inline">
                   <input class="layui-input" name="id" id="demoReload" placeholder="搜索轮播图" autocomplete="off">
                 </div>
                 <button class="layui-btn" data-type="reload">搜索</button> -->
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>菜单名称</th>
                    <th>路由</th>
                    <th>状态</th>
                    <th >操作</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td data-field="id"><div class="layui-table-cell laytable-cell-1-id"><?php echo $menu->id; ?></div></td>
                        <td>|—<?php echo $menu->name; ?></td>
                        <td><?php echo e($menu->url); ?></td>
                        <td><?php echo e($menu->status); ?></td>
                        <td data-field="score" align="right" data-off="true">
                            <div class="layui-table-cell laytable-cell-1-score">
                                <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                                <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                            </div>
                        </td>
                    </tr>
                    <?php if($children = $menu->getChildren()): ?>
                        <?php echo $__env->make('menu.admin.sub.trtable', array('menus' => $children,'level' => 1), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>

<script type="text/html" id="imageTEM">
    <img src="{{d.image}}" alt="" height="28">
</script>

<script>
    layui.use(['element','table'], function(){
        var table = layui.table;
        var form = layui.form;

        //监听工具条
        table.on('tool(fb-table)', function(obj){
            var data = obj.data;
            var JSONdata =  JSON.stringify(data);
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('真的删除行么', function(index){
                    obj.del();
                    layer.close(index);
                });
            } else if(obj.event === 'edit'){
                // console.log(data.id)
                window.location.href="caseedit.html?id="+data.id
                // layer.alert('编辑行：<br>'+ JSON.stringify(data))
            }
        });
        //监听锁定
        form.on('switch(lock)', function(obj){
            $.post("https://api.myjson.com",{"id":this.value,"lock":obj.elem.checked},function(){

            })
            // layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });
        var $ = layui.$, active = {
            reload: function(){
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('fb-table', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        name: demoReload.val()
                    }
                });
            },
            del:function(){
                var checkStatus = table.checkStatus('fb-table')
                        ,data = checkStatus.data;
                data.length == 0 ?
                        layer.msg('请选择要删除的数据', {
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        })
                        :
                        layer.confirm('是否删除已选择的数据',{title:'提示'},function(index){
                            var nPage = $(".layui-laypage-curr em").eq(1).text();
                            //执行重载

                            table.reload('fb-table', {
                                page: {
                                    curr: nPage //重新从第 1 页开始
                                }
                            });
                            layer.close(index)
                        })  ;

            }
        };
        $('.tabel-message .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>

<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td data-field="id"><div class="layui-table-cell laytable-cell-1-id"><?php echo $menu->id; ?></div></td>
        <td style="padding-left: <?php echo 30*$level; ?>px;">|—<?php echo str_repeat('—',$level); ?><?php echo $menu->name; ?></td>
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
        <?php if(count($children)): ?>
            <?php echo $__env->make('menu.admin.sub.trtable', array('menus' => $children,'level' => $level++), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    @endifs
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
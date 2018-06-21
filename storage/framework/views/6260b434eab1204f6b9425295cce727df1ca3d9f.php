<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($menu->has_role): ?>
    <li class="layui-nav-item <?php echo e($menu->active ? 'layui-nav-itemed' : ''); ?>">
        <?php if($menu->hasChildren()): ?>
            <a href="javascript:;"><i class="layui-icon <?php echo e($menu->icon); ?>"></i><?php echo e($menu->name); ?></a>
            <?php echo $__env->make('menu.menu.sub.admin', array('menus' => $menu->getChildren()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
            <a href="<?php echo e(trans_url($menu->url)); ?>"><i class="layui-icon <?php echo e($menu->icon); ?>"></i><?php echo e($menu->name); ?></a>
        <?php endif; ?>
    </li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

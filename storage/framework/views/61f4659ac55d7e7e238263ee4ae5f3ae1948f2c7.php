<dl class="layui-nav-child">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($menu->has_role): ?>
            <?php if($menu->hasChildren()): ?>

            <?php else: ?>
                <dd><a href="<?php echo e(trans_url($menu->url)); ?>"><?php echo e($menu->name); ?></a></dd>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</dl>
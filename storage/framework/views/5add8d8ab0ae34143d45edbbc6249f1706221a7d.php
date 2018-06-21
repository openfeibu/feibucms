<div class="dd" id="nestable">
    <ol class="dd-list">
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($children = $menu->getChildren()): ?>
        <li class="dd-item dd3-item" data-id="<?php echo $menu->getRouteKey(); ?>">
            <div class="dd-handle dd3-handle">Drag</div>
            <div class="dd3-content">
                <a href="#" data-action="LOAD" data-load-to='#menu-entry' data-href='<?php echo e(guard_url('menu/submenu')); ?>/<?php echo $menu->getRouteKey(); ?>'>
                    <i class="<?php echo !empty($menu->icon) ?  $menu->icon : ''; ?>"></i> <?php echo $menu->name; ?>

                    <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                </a>
            </div>
            <ol class="dd-list">
                <?php echo $__env->make( 'menu::admin.menu.sub.nestable', array('menus' => $children), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </ol>
        </li>
        <?php else: ?>
        <li class="dd-item dd3-item" data-id="<?php echo $menu->getRouteKey(); ?>">
            <div class="dd-handle dd3-handle">Drag</div>
            <div class="dd3-content">
                <a href="#" data-action="LOAD" data-load-to='#menu-entry' data-href='<?php echo e(guard_url('menu/submenu')); ?>/<?php echo $menu->getRouteKey(); ?>'>
                    <i class="<?php echo !empty($menu->icon) ?  $menu->icon : ''; ?>"></i> <?php echo $menu->name; ?>

                    <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
                </a>
            </div>
        </li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</div>

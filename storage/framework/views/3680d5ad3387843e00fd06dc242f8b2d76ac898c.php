<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
        <?php echo trans('menu::menu.name'); ?>

        <small> <?php echo trans('app.manage'); ?> <?php echo trans('menu::menu.names'); ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo guard_url('admin'); ?>"><i class="fa fa-dashboard"></i> <?php echo trans('app.home'); ?> </a></li>
            <li class="active"><?php echo trans('menu::menu.names'); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class='row' style="min-height:700px;">
            <div class="col-md-5">
                <div class="nav-tabs-custom">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs primary">
                        <?php $__currentLoopData = $rootMenu->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li <?php echo e(($parent->getRouteKey() == $menu->getRouteKey()) ? ' class=active ' : ''); ?>><a href="<?php echo e(guard_url('menu/menu')); ?>/<?php echo e($menu->getRouteKey()); ?>"><?php echo e($menu->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              More <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <?php $__currentLoopData = $rootMenu->except([1,2,3]); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo e(guard_url('menu/menu')); ?>/<?php echo e($menu->getRouteKey()); ?>"><?php echo e($menu->name); ?> menu</a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <li class="pull-right"><a href="#" data-href="<?php echo e(guard_url('menu/menu/create')); ?>"  data-action="LOAD" data-load-to="#menu-entry"><i class="fa fa-plus-circle"></i></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="details">
                            <?php echo Menu::menu($parent->key, 'menu::admin.menu.nestable'); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div id='menu-entry'>
                </div>
            </div>
        </div>
    </section>
</div>





<script type="text/javascript">
$(document).ready(function(){

    var updateMenu = function(e)
    {
        var out = $(e.target).nestable('serialize');
        out     = JSON.stringify(out);

        var formData = new FormData();
        formData.append('tree', out);

        var url  = '<?php echo guard_url('menu/menu/'. $parent->getRouteKey() . '/tree'); ?>';

        $.ajax( {
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success:function (data, textStatus, jqXHR)
            {
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
    };

    $('.dd').nestable().on('change', updateMenu);


    $('#menu-entry').load('<?php echo e(guard_url('menu/menu')); ?>/<?php echo e($parent->getRouteKey()); ?>');


});
</script>

<style type="text/css">
.box-body{
    min-height: 420px;
}
</style>
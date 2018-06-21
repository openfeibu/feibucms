
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab"><?php echo e(trans('page::page.tab.page')); ?></a></li>
            <li><a href="#metatags" data-toggle="tab"><?php echo e(trans('page::page.tab.meta')); ?></a></li>
            <li><a href="#settings" data-toggle="tab"><?php echo e(trans('page::page.tab.setting')); ?></a></li>
            <li><a href="#images" data-toggle="tab"><?php echo e(trans('page::page.tab.image')); ?></a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#page-page-entry' data-href='<?php echo e(Trans::to('admin/page/page/create')); ?>'><i class="fa fa-plus-circle"></i> <?php echo e(trans('app.new')); ?></button>
                <?php if($page->id): ?>
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#page-page-entry' data-href='<?php echo e(guard_url('page/page')); ?>/<?php echo e($page->getRouteKey()); ?>/edit'><i class="fa fa-pencil-square"></i> <?php echo e(trans('app.edit')); ?></button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#page-page-entry' data-datatable='#page-page-list' data-href='<?php echo e(guard_url('page/page')); ?>/<?php echo e($page->getRouteKey()); ?>' >
                <i class="fa fa-times-circle"></i> <?php echo e(trans('app.delete')); ?>

                </button>
                <?php endif; ?>
            </div>
        </ul>
        <?php echo Form::vertical_open()
        ->id('show-page-show')
        ->method('PUT')
        ->action(guard_url('page/page/'. $page->getRouteKey())); ?>

        <?php echo Form::token(); ?>

        <div class="tab-content clearfix">
            <div class="tab-pan-title">  <?php echo e(trans('app.show')); ?>   [<?php echo $page->name; ?>]</div>             
                <?php echo $__env->make('page::admin.page.partial.entry', ['mode' => 'show'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>             
        </div>
    </div>

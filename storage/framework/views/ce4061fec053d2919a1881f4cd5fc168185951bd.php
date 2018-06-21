<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <title><?php echo Theme::getTitle(); ?> :: <?php echo e(trans('app.name')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('layui/css/layui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin/main.css')); ?>">
    <!-- <script src='<?php echo e(asset('js/jquery-1.7.2.min.js')); ?>'></script> -->
</head>
<body>
    <?php $__env->startSection('header'); ?>
        <?php echo $__env->make('admin.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('aside'); ?>
        <?php echo $__env->make('admin.partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <script src='<?php echo e(asset('layui/layui.js')); ?>'></script>
    <script src='<?php echo e(asset('js/admin/main.js')); ?>'></script>
    <?php $__env->startSection('footer'); ?>
        <?php echo $__env->make('admin.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('footer_is'); ?>
    <?php $__env->stopSection(); ?>
</body>
</html>

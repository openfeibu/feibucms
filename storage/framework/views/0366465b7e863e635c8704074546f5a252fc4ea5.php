<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo Theme::getTitle(); ?> :: <?php echo e(trans('app.name')); ?></title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo e(asset('css/font.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/xadmin.css')); ?>">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('lib/layui/layui.js')); ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/xadmin.js')); ?>"></script>

</head>
<body class="login-bg">
<?php echo Theme::content(); ?>

</body>
</html>
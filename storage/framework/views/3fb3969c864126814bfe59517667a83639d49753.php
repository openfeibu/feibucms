<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <title>小程序管理后台</title>
    <link rel="stylesheet" href="{ asset('layui/css/layui.css') }">
    <link rel="stylesheet" href="{ asset('css/main.css') }">
    <!-- <script src='{ asset('js/jquery-1.7.2.min.js') }'></script> -->

</head>
<body>
<?php echo Theme::partial('header'); ?>

<?php echo Theme::partial('aside'); ?>

<?php echo Theme::content(); ?>

</body>
</html>

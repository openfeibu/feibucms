<!DOCTYPE HTML>
<html class=" fb-web oxh">

<head>
    <meta charset="utf-8">
    <meta name="referrer" content="never">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <title>{{ setting('station_name') }}</title>
    <meta name="description" content="广东溢多利生物科技股份有限公司">
    <meta name="keywords" content="广东溢多利生物科技股份有限公司,溢多利">
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
    <!--[if lte IE 9]>
    {!! Theme::asset()->container('ie9')->scripts() !!}
    <![endif]-->
    <script>
        csrf_token = "{!! csrf_token() !!}";
    </script>
</head>
<!--[if lte IE 9]>
<div class="text-xs-center marginBottom0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span>×</span>
    </button>
    你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href=https://browsehappy.com/ target=_blank>升级您的浏览器</a>，以提高您的体验。</div>
<![endif]-->
<body>
{!! Theme::partial('header') !!}

{!! Theme::content() !!}

<!-- 尾部 -->
{!! Theme::partial('footer') !!}
<!-- 移动端导航 -->
{!! Theme::partial('mobile_header') !!}

</body>


</html>
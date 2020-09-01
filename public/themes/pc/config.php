<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
     */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | List view for the theme
    |--------------------------------------------------------------------------
    |
    | Here you can specify which view is to be loaded for the list page
    | this can be 'list', 'grid', 'box', 'bootstrap-table' or 'data-table'
    |
    | You can specify additional views but you have to create it under 
    | 'patrial/list' folder of each package that uses this theme.
    |
     */

    'listView' => 'data-table', //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
     */
 
    'events'  => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before'             => function ($theme) {
            // You can remove this line anytime.
            // $theme->setTitle(__('app.name'));

        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme'  => function ($theme) {

            $theme->asset()->usePath()->add('bootstrap_css', 'css/bootstrap.min.css');
            $theme->asset()->usePath()->add('fb-main_css', 'css/fb-main.css');
            $theme->asset()->usePath()->add('animate_css', 'css/animate.min.css');
            $theme->asset()->add('swiper_css', 'lib/swiper/swiper-3.4.2.min.css');

            $theme->asset()->usePath()->add('jquery_js', 'js/jquery.min.js');
            $theme->asset()->add('swiper_js', 'lib/swiper/swiper-3.4.2.jquery.min.js');
            $theme->asset()->usePath()->add('fb-main_js', 'js/fb-main.js');
            $theme->asset()->usePath()->add('wow_js', 'js/wow.min.js');

            $theme->asset()->container('player')->usePath()->add('player_js', 'js/player.js');
            $theme->asset()->container('ie9')->usePath()->add('respond_js', 'js/respond.js');
            $theme->asset()->container('ie9')->usePath()->add('tqj_html5shiv_js', 'js/tqj_html5shiv.js');
            /*
            $theme->asset()->add('fbUi_css', 'lib/fbui/fbUi.css');
            $theme->asset()->add('swiper_css', 'lib/swiper/swiper-3.4.2.min.css');
            $theme->asset()->usePath()->add('style_css', 'css/style.css');
            $theme->asset()->add('jquery_js', 'js/jquery-1.7.2.min.js');

            $theme->asset()->container('ie9')->add('respond_js', 'js/respond.js');
            $theme->asset()->container('ie9')->add('html5shiv_js', 'js/html5shiv.js');

            $theme->asset()->add('swiper_js', 'lib/swiper/swiper-3.4.2.jquery.min.js');
            $theme->asset()->usePath()->add('common_js', 'js/common.js');
            $theme->asset()->add('fbUi_js', 'lib/fbui/fbUi.js');
            $theme->asset()->add('img_up_css', 'lib/imgup/imgUp.css');
            $theme->asset()->add('img_up_js', 'lib/imgup/imgUp.js');

            $theme->asset()->container('webuploader')->add('webuploader_style', 'lib/webuploader/css/style.css');
            $theme->asset()->container('webuploader')->add('webuploader_css', 'lib/webuploader/webuploader.css');
            $theme->asset()->container('webuploader')->add('webuploader_js', 'lib/webuploader/webuploader.js');
            $theme->asset()->container('upload_js')->add('upload_js', 'lib/webuploader/js/upload.js');
            */
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

        ],
    ],

];

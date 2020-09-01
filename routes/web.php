<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');
    Route::get('/', 'ResourceController@home')->name('home');
    Route::get('/dashboard', 'ResourceController@dashboard')->name('dashboard');
    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');
    Route::resource('business', 'BusinessResourceController');
    Route::post('/business/destroyAll', 'BusinessResourceController@destroyAll')->name('business.destroy_all');
    Route::post('/business/updateRecommend', 'BusinessResourceController@updateRecommend')->name('business.update_recommend');
    Route::resource('news', 'NewsResourceController');
    Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    Route::post('/news/updateRecommend', 'NewsResourceController@updateRecommend')->name('news.update_recommend');
    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');
    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::get('/setting/publicityVideo', 'SettingResourceController@publicityVideo')->name('setting.publicity_video.index');
    Route::post('/setting/updatePublicityVideo', 'SettingResourceController@updatePublicityVideo');
    Route::get('/setting/station', 'SettingResourceController@station')->name('setting.station.index');
    Route::post('/setting/updateStation', 'SettingResourceController@updateStation');

    Route::resource('recruit', 'RecruitResourceController');
    Route::post('/recruit/destroyAll', 'RecruitResourceController@destroyAll')->name('recruit.destroy_all');
    Route::resource('link', 'LinkResourceController');
    Route::post('/link/destroyAll', 'LinkResourceController@destroyAll')->name('link.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::group(['prefix' => 'case','as' => 'case.'], function ($router) {
        Route::resource('case', 'CaseResourceController');
        Route::post('/case/destroyAll', 'CaseResourceController@destroyAll')->name('case.destroy_all');
        Route::resource('category', 'CaseCategoryResourceController');
        Route::post('/category/destroyAll', 'CaseCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::group(['prefix' => 'page','as' => 'page.'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');
    });
    Route::group(['prefix' => 'page','as' => 'page.','namespace' => 'Page'], function ($router) {
       // Route::get('/about', 'AboutResourceController@show')->name('about.index');
        Route::get('/about/show', 'AboutResourceController@show')->name('about.show');
        Route::post('/about/store', 'AboutResourceController@store')->name('about.store');
        Route::put('/about/update/{page}', 'AboutResourceController@update')->name('about.update');

       // Route::get('/culture', 'CultureResourceController@show')->name('culture.index');
        Route::get('/culture/show', 'CultureResourceController@show')->name('culture.show');
        Route::post('/culture/store', 'CultureResourceController@store')->name('culture.store');
        Route::put('/culture/update/{page}', 'CultureResourceController@update')->name('culture.update');

        /*产品中心*/
        Route::resource('product', 'ProductResourceController');
        Route::post('/product/destroyAll', 'ProductResourceController@destroyAll')->name('product.destroy_all');

    });
    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });

    Route::group(['prefix' => 'nav','as' => 'nav.'], function ($router) {
        Route::resource('nav', 'NavResourceController');
        Route::get('/nav_tree', 'NavResourceController@navTree')->name('nav.nav_tree');
        Route::post('/nav/destroyAll', 'NavResourceController@destroyAll')->name('nav.destroy_all');
        Route::resource('category', 'NavCategoryResourceController');
        Route::post('/category/destroyAll', 'NavCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::group(['prefix' => 'course','as' => 'course.','namespace' => 'Course'], function ($router) {

        /* 发展历程 */
        Route::resource('development_course', 'DevelopmentCourseResourceController');
        Route::post('/development_course/destroyAll', 'DevelopmentCourseResourceController@destroyAll')->name('development_course.destroy_all');

    });

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');
});


Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Route::get('/', 'HomeController@home')->name('home');

    Route::get('/about/', function () {
        return redirect('/profile');
    })->name('about');

    Route::get('/case','CaseController@index')->name('case.index');
    Route::get('/case/{case}','CaseController@show')->name('case.show');
    Route::get('/profile','AboutController@profile')->name('profile');
    Route::get('/culture','AboutController@culture')->name('culture');
    Route::get('/course/development_course','CourseController@development_course')->name('development_course');

    Route::get('/product/','ProductController@index')->name('product.index');
    Route::get('/product/{product}','ProductController@show')->name('product.show');
    Route::get('/contact','ContactController@show')->name('contact.index');

    Route::get('/news','NewsController@index')->name('news.index');
    Route::get('/news/{news}','NewsController@show')->name('news.show');
    Route::get('/contact_us','ContactController@contact_us')->name('contact_us');
});

//Route::get('
///{slug}.html', 'PagePublicController@getPage');
/*
Route::group(
    [
        'prefix' => trans_setlocale() . '/admin/menu',
    ], function () {
    Route::post('menu/{id}/tree', 'MenuResourceController@tree');
    Route::get('menu/{id}/test', 'MenuResourceController@test');
    Route::get('menu/{id}/nested', 'MenuResourceController@nested');

    Route::resource('menu', 'MenuResourceController');
   // Route::resource('submenu', 'SubMenuResourceController');
});
*/
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

Route::get('/', function () {
    return view('welcome');
});
// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => set_route_guard('web')
], function () {
    Auth::routes();
    Route::get('/', 'ResourceController@home');
    Route::get('/dashboard', 'ResourceController@dashboard');
    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/deleteAll', 'BannerResourceController@destoryAll');
    Route::resource('business', 'BusinessResourceController');
    Route::post('/business/deleteAll', 'BusinessResourceController@destoryAll');
    Route::post('/business/updateRecommend', 'BusinessResourceController@updateRecommend');
    Route::resource('news', 'NewsResourceController');
    Route::post('/news/deleteAll', 'NewsResourceController@destoryAll');
    Route::post('/news/updateRecommend', 'NewsResourceController@updateRecommend');
    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/deleteAll', 'SystemPageResourceController@destoryAll');
    Route::get('/setting/company', 'SettingResourceController@company');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::resource('recruit', 'RecruitResourceController');
    Route::post('/recruit/deleteAll', 'RecruitResourceController@destoryAll');
    Route::resource('link', 'LinkResourceController');
    Route::post('/link/deleteAll', 'LinkResourceController@destoryAll');
    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::group(['prefix' => 'case'], function ($router) {
        Route::resource('case', 'CaseResourceController');
        Route::post('/case/deleteAll', 'CaseResourceController@destoryAll');
        Route::resource('category', 'CaseCategoryResourceController');
        Route::post('/category/deleteAll', 'CaseCategoryResourceController@destoryAll');
    });

    Route::group(['prefix' => 'page'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');
    });
    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });
    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');
    Route::get('logout', 'Auth\LoginController@logout');
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
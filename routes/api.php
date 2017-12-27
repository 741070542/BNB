<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('login', function (){
    return response('not auth',200);
})->name('login');

Route::post('/logo', 'LogoController@logo'); //登录
Route::get('/captcha/{tmp}', 'LogoController@captcha'); //图片验证码
Route::post('/province', 'CityController@province'); //省
Route::post('/city', 'CityController@city'); //市
Route::post('/county', 'CityController@county'); //区县


Route::post('/wer_add', 'LogoController@wer_add'); //验证图片验证码并发送短信
Route::post('/registr', 'LogoController@registration'); //提交注册
Route::post('/calendar', 'CalendarController@index_housing'); //订单信息
Route::post('/types', 'CalendarController@index_type'); //房型列表
Route::post('/housess', 'CalendarController@index_houses'); //房间列表
Route::post('/adorder', 'AddController@add_order'); //添加入住
Route::post('/adtype', 'AddController@add_type'); //添加房型
Route::post('/houses', 'EditController@houses'); //编辑房间的信息回显
Route::post('/edhouses', 'EditController@edit_houses'); //编辑房间
Route::post('/type', 'EditController@type'); //编辑房型信息回显
Route::post('/edtype', 'EditController@edit_type'); //编辑房型
Route::post('/order', 'EditController@order'); //编辑订单信息回显
Route::post('/edorder', 'EditController@edit_order'); //编辑订单
Route::post('/deorder', 'DeleController@deorder'); //取消入住与取消屏蔽
Route::post('/detype', 'DeleController@detype');  //删除房型
Route::post('/dehouses', 'DeleController@dehouses'); //删除房间
Route::post('/statistics', 'StaController@statistics'); //统计
Route::post('/ordsta', 'StaController@order'); //订单
Route::post('/adsources', 'AddController@add_sources'); //添加来源
Route::post('/sources', 'EditController@sources'); //编辑来源的信息回显
Route::post('/edsources', 'EditController@edit_sources'); //编辑房间
Route::post('/sourcess', 'CalendarController@index_sources'); //来源列表
Route::post('/colorlists', 'ColorController@lists'); //颜色列表
Route::post('/coloredit', 'ColorController@edit'); //颜色备注设置
Route::post('/desources', 'DeleController@desources');  //删除来源

Route::group(['middleware'=>['client_credentials']],function(){
//    Route::middleware('client_credentials');
//    Route::post('/wer_add', 'LogoController@wer_add'); //验证图片验证码并发送短信
//    Route::post('/registr', 'LogoController@registration'); //提交注册
//
//    Route::post('/calendar', 'CalendarController@index_housing'); //订单信息
//    Route::post('/types', 'CalendarController@index_type'); //房型列表
//    Route::post('/housess', 'CalendarController@index_houses'); //房间列表
//    Route::post('/adorder', 'AddController@add_order'); //添加入住
//    Route::post('/adtype', 'AddController@add_type'); //添加房型
//    Route::post('/houses', 'EditController@houses'); //编辑房间的信息回显
//    Route::post('/edhouses', 'EditController@edit_houses'); //编辑房间
//    Route::post('/type', 'EditController@type'); //编辑房型信息回显
//    Route::post('/edtype', 'EditController@edit_type'); //编辑房型
//    Route::post('/order', 'EditController@order'); //编辑订单信息回显
//    Route::post('/edorder', 'EditController@edit_order'); //编辑订单
//    Route::post('/deorder', 'DeleController@deorder'); //取消入住与取消屏蔽
//    Route::post('/detype', 'DeleController@detype');  //删除房型
//    Route::post('/dehouses', 'DeleController@dehouses'); //删除房间
//    Route::post('/statistics', 'StaController@statistics'); //统计
//    Route::post('/ordsta', 'StaController@order'); //订单
//    Route::post('/adsources', 'AddController@add_sources'); //添加来源
//    Route::post('/sources', 'EditController@sources'); //编辑来源的信息回显
//    Route::post('/edsources', 'EditController@edit_sources'); //编辑房间
//    Route::post('/sourcess', 'CalendarController@index_sources'); //来源列表
//    Route::post('/colorlists', 'ColorController@lists'); //颜色列表
//    Route::post('/coloredit', 'ColorController@edit'); //颜色备注设置
//    Route::post('/desources', 'DeleController@desources');  //删除来源
});




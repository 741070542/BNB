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

Route::post('/logo', 'LogoController@logo'); //��¼
Route::get('/captcha/{tmp}', 'LogoController@captcha'); //��֤��

Route::post('/calendar', 'CalendarController@index_housing'); //������Ϣ
Route::post('/types', 'CalendarController@index_type'); //�����б�
Route::post('/housess', 'CalendarController@index_houses'); //�����б�
Route::post('/adorder', 'AddController@add_order'); //�����ס
Route::post('/adtype', 'AddController@add_type'); //��ӷ���
Route::post('/houses', 'EditController@houses'); //�༭�������Ϣ����
Route::post('/edhouses', 'EditController@edit_houses'); //�༭����
Route::post('/type', 'EditController@type'); //�༭������Ϣ����
Route::post('/edtype', 'EditController@edit_type'); //�༭����
Route::post('/order', 'EditController@order'); //�༭������Ϣ����
Route::post('/edorder', 'EditController@edit_order'); //�༭����
Route::post('/deorder', 'DeleController@deorder'); //ȡ����ס��ȡ������
Route::post('/detype', 'DeleController@detype');  //ɾ������
Route::post('/dehouses', 'DeleController@dehouses'); //ɾ������
Route::post('/statistics', 'StaController@statistics'); //ͳ��
Route::post('/ordsta', 'StaController@order'); //����
Route::post('/adsources', 'AddController@add_sources'); //�����Դ
Route::post('/sources', 'EditController@sources'); //�༭��Դ����Ϣ����
Route::post('/edsources', 'EditController@edit_sources'); //�༭����
Route::post('/sourcess', 'CalendarController@index_sources'); //��Դ�б�
Route::post('/wer_add', 'LogoController@wer_add'); //��֤��֤��

Route::group(['middleware'=>['auth:api']
],function(){
//    Route::post('/calendar', 'CalendarController@index_housing'); //������Ϣ
//    Route::post('/types', 'CalendarController@index_type'); //�����б�
//    Route::post('/housess', 'CalendarController@index_houses'); //�����б�
//    Route::post('/adorder', 'AddController@add_order'); //�����ס
//    Route::post('/adtype', 'AddController@add_type'); //��ӷ���
//    Route::post('/houses', 'EditController@houses'); //�༭�������Ϣ����
//    Route::post('/edhouses', 'EditController@edit_houses'); //�༭����
//    Route::post('/type', 'EditController@type'); //�༭������Ϣ����
//    Route::post('/edtype', 'EditController@edit_type'); //�༭����
//    Route::post('/order', 'EditController@order'); //�༭������Ϣ����
//    Route::post('/edorder', 'EditController@edit_order'); //�༭����
//    Route::post('/deorder', 'DeleController@deorder'); //ȡ����ס��ȡ������
//    Route::post('/detype', 'DeleController@detype');  //ɾ������
//    Route::post('/dehouses', 'DeleController@dehouses'); //ɾ������
//    Route::post('/statistics', 'StaController@statistics'); //ͳ��
//    Route::post('/ordsta', 'StaController@order'); //����
//    Route::post('/adsources', 'AddController@add_sources'); //�����Դ
//    Route::post('/sources', 'EditController@sources'); //�༭��Դ����Ϣ����
//    Route::post('/edsources', 'EditController@edit_sources'); //�༭����
//    Route::post('/sourcess', 'CalendarController@index_sources'); //��Դ�б�
//    Route::post('/wer_add', 'LogoController@wer_add'); //��֤��֤��
});




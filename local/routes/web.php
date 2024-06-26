<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TopController@index')->name('top');


Route::post('login', 'TopController@loginUser')->name('loginUser');
Route::get('logoutuser', 'TopController@logoutuser');
Route::post('customer', 'TopController@customer')->name('customer');
Route::get('forgot-password', 'TopController@forgotPassword');
Route::post('forgot-password', 'TopController@forgotPasswordPost');
Route::get('verify-password', 'TopController@verifyPassword');
Route::post('verify-password', 'TopController@changePassword');

Route::get('usermanager', 'TopController@usermanager');
Route::post('usermanager', 'TopController@update_usermanager');
Route::get('usermanager/caynhiphan', 'TopController@caynhiphan')->name('caynhiphan');
Route::post('usermanager/doiDiemSangTien', 'TopController@doiDiemSangTien')->name('doitien');


Route::get('chuyennhanh/{status}/{id}', 'TopController@chuyenhanh');
Route::get('san-pham/{id}/{slug}.html', 'TopController@details');
Route::get('chi-tiet-san-pham/{id}/{slug}.html', 'TopController@detailsProduct');
Route::get('danh-muc/{id}/{type_menu}/{slug}.html', 'TopController@catesTotal');
Route::get('loai-san-pham/{type}.html', 'TopController@catesLoaiSanpham');
Route::get('bai-viet/{id}/{slug}.html', 'TopController@postDetail');
Route::get('getPostWhereProvince/{id}', 'TopController@getPostWhereProvince')->name('getPostWhereProvince');
Route::get('dang-ky.html', 'TopController@dangky');
Route::post('dang-ky.html', 'TopController@postdangky');

Route::get('searchProduct', 'HomeController@searchProduct')->name('searchProduct');
Route::get('searchPost', 'HomeController@searchPost')->name('searchPost');
Route::get('searchProductForMember', 'HomeController@searchProductForMember')->name('searchProductForMember');
Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}', 'CartController@getaddcart');
    Route::get('show', 'CartController@cartshow');
    Route::post('show', 'CartController@postmail');
    Route::get('delete/{rowid}', 'CartController@cartdelete');
    Route::get('update', 'CartController@cartupdate');
});
Route::group(['prefix' => 'trac-nghiem'], function () {
    Route::get('trac-nghiem', 'QuizController@index');
    Route::get('/{id}/{name}.html', 'QuizController@topicSet');
    Route::get('/replyChoose/{idReply}/{idQuestion}', 'QuizController@replyChoose');
    Route::get('next-question/{questionGroupId}/{sortIndex}', 'QuizController@nextQuestion');
});

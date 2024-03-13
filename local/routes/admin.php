<?php

use Illuminate\Support\Facades\Route;

Route::get('loginql', 'LoginController@index');
Route::post('loginql', 'LoginController@post');
Route::get('logout', 'LoginController@logout');//->middleware('CheckUserLoginAlready');

Route::group(['middleware' => [CheckLogout::class], 'as' => 'admin.'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('users', 'UserController@index');
    Route::get('users/create', 'UserController@create');
    Route::post('users/create', 'UserController@store');
    Route::get('users/destroy/{id}', 'UserController@destroy');
    Route::get('users/edit/{id}', 'UserController@edit');
    Route::post('users/edit/{id}', 'UserController@update');
    Route::get('users/listDoitien', 'UserController@listDoitien');
    Route::get('users/capnhatdiem/{idUser}/{diem}/{diembandau_doanhthu}', 'UserController@capnhatDiem');
    Route::get('users/capNhatToanBoDiem', 'UserController@capNhatToanBoDiem');
    Route::get('users/history', 'UserController@history');
    Route::get('users/history/{id}', 'UserController@capnhatdoitien');


    Route::get('admin-user', 'UserController@admin');
    Route::get('admin-delete/{id}', 'UserController@adminDelete')->name('admin-delete');
    Route::get('admin-user/create', 'UserController@adminCreate');
    Route::post('admin-user/create', 'UserController@adminPostCreate');
    Route::get('admin-user/change-password/{id}', 'UserController@changePassword');
    Route::post('admin-user/change-password/{id}', 'UserController@changePasswordPost');


    Route::get('cates', 'CateController@index');
    Route::get('cates/add', 'CateController@add');
    Route::post('cates/add', 'CateController@store');
    Route::get('cates/delete/{id}', 'CateController@delete');
    Route::get('cates/edit/{id}', 'CateController@getedit');
    Route::post('cates/edit/{id}', 'CateController@postedit');
    Route::get('cates/changeStatus/{status}/{id}', 'CateController@status');

    Route::get('products', 'ProductController@index');
    Route::get('products/list', 'ProductController@list');
    Route::get('products/create', 'ProductController@create');
    Route::post('products/create', 'ProductController@store');
    Route::get('products/destroy/{id}', 'ProductController@destroy');
    Route::get('products/edit/{id}', 'ProductController@edit');
    Route::post('products/edit/{id}', 'ProductController@update');
    Route::get('products/changeStatus/{status}/{id}', 'ProductController@status');

    Route::get('post', 'PostController@index');
    Route::get('post/create', 'PostController@create');
    Route::post('post/create', 'PostController@store');
    Route::get('post/destroy/{id}', 'PostController@destroy');
    Route::get('post/edit/{id}', 'PostController@edit');
    Route::post('post/edit/{id}', 'PostController@update');
    Route::get('post/changeStatus/{status}/{id}', 'PostController@status');


    Route::get('slider', 'SliderController@index');
    Route::post('slider', 'SliderController@store');
    Route::get('slider/destroy/{id}', 'SliderController@destroy');
    Route::get('slider/edit/{id}', 'SliderController@edit');
    Route::post('slider/edit/{id}', 'SliderController@update');
    Route::get('slider/changeStatus/{status}/{id}', 'SliderController@status');

    Route::get('imfomation/', 'ImfomationsController@index');
    Route::get('imfomation/create', 'ImfomationsController@create');
    Route::post('imfomation/create', 'ImfomationsController@store');
    Route::get('imfomation/edit/{id}', 'ImfomationsController@edit');
    Route::post('imfomation/edit/{id}', 'ImfomationsController@update');

    Route::get('order', 'OrderController@index');
    Route::get('order/changeStatus/{status}/{id}', 'OrderController@status');
    Route::get('doitien', 'OrderController@doitien');

    Route::get('blogs', 'BlogsController@index');
    Route::get('blogs/create', 'BlogsController@create');
    Route::post('blogs/create', 'BlogsController@store');
    Route::get('blogs/edit/{id}', 'BlogsController@edit');
    Route::post('blogs/edit/{id}', 'BlogsController@update');
    Route::get('blogs/destroy/{id}', 'BlogsController@destroy');

    Route::get('history', 'HistoryController@index');


});


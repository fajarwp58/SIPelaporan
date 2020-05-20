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
    return redirect('login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});



Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['superadmin']], function () {

        Route::group(['prefix' => 'kelolauser'], function () {
            Route::get('/', function() { return view('kelolauser'); });
            Route::get('data', 'UserController@data');
            Route::post('create', 'UserController@create');
            Route::post('update/{id}', 'UserController@update');
            Route::get('delete/{id}', 'UserController@delete');
            Route::get('listrole', 'UserController@listrole');

        });


});


Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['superadmin','spkt']], function () {

    Route::group(['prefix' => 'kelolapelapor'], function () {
        Route::get('/', function() { return view('kelolapelapor'); });
        Route::get('data', 'PelaporController@data');
        Route::post('create', 'PelaporController@create');
        Route::post('update/{id}', 'PelaporController@update');
        Route::get('delete/{id}', 'PelaporController@delete');
        Route::get('listrole', 'PelaporController@listrole');

    });

    Route::group(['prefix' => 'kelolajenis'], function () {
        Route::get('/', function() { return view('kelolajenis'); });
        Route::get('data', 'KelolajenisController@data');
        Route::post('create', 'KelolajenisController@create');
        Route::post('update/{id}', 'KelolajenisController@update');
        Route::get('delete/{id}', 'KelolajenisController@delete');

    });

});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => ['superadmin','spkt','sabara']], function () {

    Route::group(['prefix' => 'home'], function () {
        Route::get('/', 'DashboardController@index');
    });

    Route::group(['prefix' => 'statistik'], function () {
        Route::get('/', 'StatistikController@index');
    });

    Route::group(['prefix' => 'kelolalaporan'], function () {
        Route::get('/', function() { return view('kelolalaporan'); });
        Route::post('create', 'KelolalaporanController@create');
        Route::post('update/{id}', 'KelolalaporanController@update');
        Route::get('delete/{id}', 'KelolalaporanController@delete');
        Route::get('data', 'KelolalaporanController@data');
        Route::get('listjenis', 'KelolalaporanController@listjenis');
        Route::get('addlaporan/{id}', 'KelolalaporanController@addlaporan');
        Route::get('print/{id}', 'KelolalaporanController@print');

    });

    Route::group(['prefix' => 'kelolapelapor'], function () {
        Route::get('/', function() { return view('kelolapelapor'); });
        Route::get('data', 'PelaporController@data');
        Route::post('create', 'PelaporController@create');
        Route::post('update/{id}', 'PelaporController@update');
        Route::get('delete/{id}', 'PelaporController@delete');
        Route::get('listrole', 'PelaporController@listrole');

    });


    Route::group(['prefix' => 'downloadlaporan'], function () {
        Route::get('/', 'DownloadLaporanController@view');
        Route::get('data', 'DownloadLaporanController@data');
        Route::get('pdf', 'DownloadLaporanController@pdf');

    });

    Route::group(['prefix' => 'data'], function () {
        Route::get('line', 'StatistikController@getMonthlyPostData');
        Route::get('jenis', 'StatistikController@alljenis');

    });

    Route::group(['prefix' => 'kelolajenis'], function () {
        Route::get('/', function() { return view('kelolajenis'); });
        Route::get('data', 'KelolajenisController@data');
        Route::post('create', 'KelolajenisController@create');
        Route::post('update/{id}', 'KelolajenisController@update');
        Route::get('delete/{id}', 'KelolajenisController@delete');

    });

});





Route::group(['prefix' => 'user'], function () {
    Route::get('/', function() { return view('auth.register'); });
    Route::post('create', 'UserController@create');
    Route::post('update/{id}', 'UserController@update');
    Route::post('delete/{id}', 'UserController@delete');
    Route::get('listrole', 'UserController@listrole');
    Route::get('listpangkat', 'UserController@listpangkat');

});


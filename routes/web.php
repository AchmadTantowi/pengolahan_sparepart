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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::prefix('admin')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', 'Admin\DashboardController@index');

    // MASTER USER
    Route::get('/user', 'Admin\UserController@index');
    Route::get('/user/add', 'Admin\UserController@add');
    Route::post('/user/save', 'Admin\UserController@save');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit');
    Route::get('/user/delete/{id}', 'Admin\UserController@delete');
    Route::post('/user/update/{id}', 'Admin\UserController@update');

    // MASTER MESIN
    Route::get('/mesin', 'Admin\MesinController@index');
    Route::get('/mesin/add', 'Admin\MesinController@add');
    Route::post('/mesin/save', 'Admin\MesinController@save');
    Route::get('/mesin/edit/{id}', 'Admin\MesinController@edit');
    Route::get('/mesin/delete/{id}', 'Admin\MesinController@delete');
    Route::post('/mesin/update/{id}', 'Admin\MesinController@update');

    // MASTER SPAREPART
    Route::get('/sparepart', 'Admin\SparepartController@index');
    Route::get('/sparepart/add', 'Admin\SparepartController@add');
    Route::post('/sparepart/save', 'Admin\SparepartController@save');
    Route::get('/sparepart/edit/{id}', 'Admin\SparepartController@edit');
    Route::get('/sparepart/delete/{id}', 'Admin\SparepartController@delete');
    Route::post('/sparepart/update/{id}', 'Admin\SparepartController@update');

    // MASTER SUPPLIER
    Route::get('/supplier', 'Admin\SupplierController@index');
    Route::get('/supplier/add', 'Admin\SupplierController@add');
    Route::post('/supplier/save', 'Admin\SupplierController@save');
    Route::get('/supplier/edit/{id}', 'Admin\SupplierController@edit');
    Route::get('/supplier/delete/{id}', 'Admin\SupplierController@delete');
    Route::post('/supplier/update/{id}', 'Admin\SupplierController@update');

    // REQUEST SPAREPART
    Route::get('/request', 'Admin\RequestController@index');
    Route::get('/request/edit/{id}', 'Admin\RequestController@edit');
    Route::post('/request/update/{id}', 'Admin\RequestController@update');
    Route::get('/request/print/{id}', 'Admin\RequestController@print');

    // RECEIVED
    Route::get('/received', 'Admin\ReceivedController@index');
    Route::get('/received/add', 'Admin\ReceivedController@add');
    Route::post('/received/save', 'Admin\ReceivedController@save');
    Route::get('/received/print/{id}', 'Admin\ReceivedController@print');

    // LAPORAN
    Route::get('/laporan', 'Admin\LaporanController@index');
    Route::post('/laporan/print', 'Admin\LaporanController@print');

    #### MEKANIK ####
    
    // FORM REQUEST
    Route::get('/request-sparepart', 'Admin\RequestSparepartController@index');
    Route::post('/send-request', 'Admin\RequestSparepartController@simpan');

    // HISTORY
    Route::get('/history-peminjaman', 'Admin\HistoryPeminjamanController@index');
    Route::get('/lihat-peminjaman/{id}', 'Admin\HistoryPeminjamanController@lihatPeminjaman');

});

// Route::get('/home', 'HomeController@index')->name('home');

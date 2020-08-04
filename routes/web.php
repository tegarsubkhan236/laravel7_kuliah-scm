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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/dashboard', 'DashboardController@index')->name('home');

//penjualan
Route::resource('marketing', 'MarketingController');
Route::resource('cuci', 'JenisController');
Route::resource('order', 'OrderController');

//gudang
Route::resource('supplier', 'SupplierController');
Route::resource('stock', 'StockController');
Route::resource('penyaluran', 'PenyaluranController');
Route::resource('pembelian', 'PembelianController');

//worker
Route::resource('worker', 'WorkerController');
Route::resource('temp_stock', 'TemporaryStockController');
Route::resource('stock', 'StockController');
Route::resource('order_ditampung', 'OrderDitampungController');
Route::resource('order_dikerjakan', 'OrderDikerjakanController');

Route::resource('finish', 'FinishController');

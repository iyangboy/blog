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
Route::get('/test', function () {
    echo date("Y-m-d H:i:s", mktime(0, 0, 0, date("m"), 1, date("Y")));
    echo '<br>';
    echo mktime(0, 0, 0, date("m"), 1, date("Y"));
});
Route::get('/test2', function () {
    \Illuminate\Support\Facades\DB::select('select * from products where id = :id', ['id' => 1]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {
    // 在 "App\Http\Controllers\Admin" 命名空间下的控制器
    Route::get('/admin', 'AdminController@index');
});
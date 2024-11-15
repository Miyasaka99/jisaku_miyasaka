<?php
use App\Http\Controllers\BuyController;

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

Auth::routes();
Route::group(['middleware' => 'auth'],function(){
Route::get('/home', 'HomeController@index')->name('home');

// post関連
Route::resource('posts', 'PostController')->except('index');
Route::get('/', 'PostController@index')->name('posts.index');

// mypage関連
Route::resource('mypages', 'MypageController')->except('index');
Route::get('/mypage', 'MypageController@index')->name('mypages.index');
});

// buy関連
Route::get('/buy/{id}',[BuyController::class,'buystore'])->name('buy.store');

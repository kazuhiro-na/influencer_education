<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('admin/logout', [LoginController::class,'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [RegisterController::class, 'register']);
Route::view('/admin/top', 'admin/top')->middleware('auth:admin');
Route::view('/admin/banner', 'admin/banner')->name('admin.banner');

//お知らせ一覧ページへ(仮)
Route::view('/admin/article', 'admin/login')->name('admin.article');
//授業一覧ページへ(仮)
Route::view('/admin/curriculum', 'admin/login')->name('admin.curriculum');
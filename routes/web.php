<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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
Route::get('/welcome',[FrontController::class,'index']);
Route::get('/hi',[FrontController::class,'hi']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){
    return('About Us');
});
Route::get('/hello', function(){
    return ("Hello World");
});
Route::get('/login',function(){
    return ('Login Registation Form');
});

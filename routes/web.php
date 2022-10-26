<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TextController;

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


Route::get('upload_file', [FileController::class, 'index']);
Route::post('upload_file', [FileController::class, 'upload']);

Route::get('show',function(){
    return view('show');
});

Route::post('/createText', [HomeController::class, 'createText']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/viewText/{id}', [HomeController::class, 'showText']);

Route::get('/editText/{id}', [HomeController::class, 'editText']);
Route::post('{id}', [HomeController::class, 'updateText']);

Route::get('/deleteText/{id}', [HomeController::class, 'deleteText']);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('upload_file', [FileController::class, 'index']);
Route::post('upload_file', [FileController::class, 'upload']);

Route::get('show',function(){
    return view('show');
});

Route::get('ctext', [TextController::class, 'index']);
Route::post('ctext', [TextController::class, 'createText']);
Route::get('showText', [TextController::class, 'showText']);

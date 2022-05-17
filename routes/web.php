<?php

use App\Http\Controllers\LihatDataController;
use App\Http\Controllers\LogInController;
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
    return view('welcome');
});

Route::get('/header', function () {
    return view('header', [
        // "title" => "About Us"
    ]);
});

Route::get('/login', function () {
    return view('login', [
        // "title" => "About Us"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        // "title" => "About Us"
    ]);
});

Route::get('/report', function () {
    return view('report', [
        // "title" => "About Us"
    ]);
});

Route::get('/report2', function () {
    return view('report2', [
        // "title" => "About Us"
    ]);
});

Route::get('/product', function () {
    return view('product', [
        // "title" => "About Us"
    ]);
});

Route::get('/transactionlist', function () {
    return view('transactionlist', [
        // "title" => "About Us"
    ]);
});

Route::get('/transactiondetail', function () {
    return view('transactiondetail', [
        // "title" => "About Us"
    ]);
});

Route::get('/inserttransaction', function () {
    return view('inserttransaction', [
        // "title" => "About Us"
    ]);
});

Route::get('chart', 'ChartController@index');

// Route::get('/login', [LogInController::class, 'index']);
Route::post('/login', [LogInController::class, 'authenticate']);
Route::post('/home', [LogInController::class, 'authenticate']);

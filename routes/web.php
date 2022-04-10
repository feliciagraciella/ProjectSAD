<?php

use App\Http\Controllers\LihatDataController;
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

Route::get('/report', function () {
    return view('report', [
        // "title" => "About Us"
    ]);
});

Route::get('/product', function () {
    return view('product', [
        // "title" => "About Us"
    ]);
});

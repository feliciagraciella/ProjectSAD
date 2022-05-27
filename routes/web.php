<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailTransController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LihatDataController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionListController;
use App\Models\ProductListModel;
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
    return view('login');
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
// Route::prefix("/report")->group(function (){
//     Route::get("/{id}", [ReportController::class, "report"]);
// });
Route::POST("/invoice/{email}/{tanggal}", [ShopController::class, "invoice"]);
Route::get("/report", [ReportController::class, "report"]);
// Route::get('/report', function () {
//     return view('report', [
//     ]);
// });

Route::get('/report2', function () {
    return view('report2', [
        // "title" => "About Us"
    ]);
});

// Route::get('/product', function () {
//     return view('product', [
//         // "title" => "About Us"
//     ]);
// });

Route::get("/product", [ProductListController::class, "productlist"]);

Route::get("/category", [CategoryController::class, "category"]);

// Route::get("/home", [ProductListController::class, "productlisthome"]);

Route::get("/header", [LogInController::class, "authenticate"]);
Route::get("/home", [HomeController::class, "reporthome"]);
// Route::prefix('admin')->group(function () {

// });
//  Route::get('/header', [LogInController::class, 'authenticate']);
// Route::get("/home", [DetailTransController::class, "total_sales"]);


// Route::get('/productdetail', function () {
//     return view('productdetail', [
//         // "title" => "About Us"
//     ]);
// });

// Route::get('/{product}', [ProductListController::class, 'show']);

Route::get('/insertproduct', function () {
    return view('insertproduct', [
        // "title" => "About Us"
    ]);
});

// Route::get('/transactionlist', function () {
//     return view('transactionlist', [
//         // "title" => "About Us"
//     ]);
// });

Route::get('/transactionlist', [TransactionListController::class, 'translist']);

Route::get('/inserttransaction', function () {
    return view('inserttransaction', [
        // "title" => "About Us"
    ]);
});

Route::prefix("/transactiondetail")->group(function (){
    Route::get("/{id}", [TransactionListController::class, "details"]);
});

Route::get('chart', 'ChartController@index');

// Route::get('/login', [LogInController::class, 'index']);
// Route::post('/login', [LogInController::class, 'authenticate']);
// Route::post('/home', [LogInController::class, 'authenticate']);

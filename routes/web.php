<?php

//use App\Http\Controllers\IsinExcelExportController;
use App\Http\Controllers\IsinExportController;
//use App\Http\Controllers\IsinXmlExportController;
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
    return view('index');
});

Route::get('/export/{type}', IsinExportController::class);

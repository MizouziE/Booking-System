<?php

use App\Http\Controllers\ServicesController;
use App\Models\Service;
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

Route::post('/services', [ServicesController::class, 'store']);

Route::get('services', [ServicesController::class, 'index']);

Route::get('/services/{service}', [ServicesController::class, 'show']);

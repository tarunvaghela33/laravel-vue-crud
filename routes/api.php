<?php

use App\Http\Controllers\{KelasController, SiswaController, UserController, DashboardController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// dashboard route
Route::get('/dashboard', [DashboardController::class,'index']);
// pages routes
Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('users', UserController::class);
Route::post('/option/value', [SiswaController::class,'option']);
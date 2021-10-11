<?php

use App\Http\Controllers\PekebunController;
use App\Http\Controllers\PerniagaanController;
use App\Http\Controllers\SyarikatController;
use App\Http\Controllers\UsahawanController;
use App\Http\Controllers\UserController;
use App\Models\Pekebun;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('user', UserController::class);
Route::apiResource('usahawan', UsahawanController::class);
Route::apiResource('pekebun', PekebunController::class);
Route::apiResource('syarikat', SyarikatController::class);
Route::apiResource('perniagaan', PerniagaanController::class);

// Route::('checkUser', [UserController::class, 'checkUser']);

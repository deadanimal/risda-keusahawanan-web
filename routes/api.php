<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriAliranController;
use App\Http\Controllers\PekebunController;
use App\Http\Controllers\PerniagaanController;
use App\Http\Controllers\SyarikatController;
use App\Http\Controllers\UsahawanController;
use App\Http\Controllers\UserController;
use App\Models\Pekebun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
Route::apiResource('kategori_aliran', KategoriAliranController::class);


// Route::('checkUser', [UserController::class, 'checkUser']);
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'no_kp' => 'required',
        'password' => 'required',
        // 'device_name' => 'required',
    ]);

    $user = User::where('no_kp', $request->no_kp)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return response()->json($user->createToken($request->no_kp)->plainTextToken);
});

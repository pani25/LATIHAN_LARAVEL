<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseApiController;
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

// register && login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/courses', [CourseApiController::class, 'index']);

Route::group(['middleware' => ['suth:sancum']], function () {
    // crud course menggunakan token
    Route::post('/courses', [CourseApiController::class, 'store']);
    Route::get('/courses/{id}', [CourseApiController::class, 'show']);
    Route::put('/courses/{id}', [CourseApiController::class, 'update']);
    Route::delete('/courses/{id}', [CourseApiController::class, 'destroy']);

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

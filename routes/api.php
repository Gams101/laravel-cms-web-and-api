<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** AUTH */
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('posts')->group(function() {
        Route::get('list', [PostController::class, 'list']);
        Route::patch('{id}', [PostController::class, 'update']);
        Route::delete('{id}', [PostController::class, 'destroy']);
        Route::post('', [PostController::class, 'store']);
    });

    Route::prefix('pages')->group(function() {
        Route::get('list', [PageController::class, 'list']);
        Route::patch('{id}', [PageController::class, 'update']);
        Route::delete('{id}', [PageController::class, 'destroy']);
        Route::post('', [PageController::class, 'store']);
    });
});

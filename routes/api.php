<?php

use App\Http\Controllers\API\EstablishmentController;
use App\Http\Controllers\API\LevelsController;
use App\Http\Controllers\API\NewsController as NewsController;
use App\Http\Controllers\API\UsersController;
use App\Models\User;
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

Route::apiResource('/new' , NewsController::class)->middleware('apikey');

Route::apiResource('/establishment' , EstablishmentController::class)->middleware('apikey');

Route::apiResource('/member' , UsersController::class)->middleware('apikey');

Route::apiResource('/level' , LevelsController::class)->middleware('apikey');
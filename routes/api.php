<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\RoleAccessController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemAccessController;
use App\Http\Controllers\SystemController;
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


/**USERS AUTHENTICATION SECTION */
Route::post('/login',[LoginController::class,'login']);
Route::post('/register',[UserController::class,'register']);

/**API WITH AN UNAUTHORIZED ACCESS WITHOUT  AUTHENTICATION*/
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout',[UserController::class,'logout']);
    Route::get('/users',[UserController::class,'index']);
    Route::get('/user/{empid}',[UserController::class,'getAuthUser']);

    Route::apiResource('/systems',SystemController::class);
    Route::apiResource('/system-access',SystemAccessController::class);
    Route::apiResource('/roles',RoleController::class);
    Route::apiResource('/role-access',RoleAccessController::class);
});
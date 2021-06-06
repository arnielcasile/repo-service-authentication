<?php


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

Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers\Auth',
        'prefix'     => 'auth',
    ],
    function ($router) {
        Route::post('login','LoginController@login');
        Route::post('register','UserController@register');
        Route::post('logout','UserController@logout');
        Route::get('profile','UserController@profile');
        Route::post('refresh','LoginController@refresh');
    }
);

Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::apiResource('/systems','SystemController');
        Route::apiResource('/system-access','SystemAccessController');
        Route::apiResource('/roles','RoleController');
        Route::apiResource('/role-access','RoleAccessController');
    }
);


// /**USERS AUTHENTICATION SECTION */
// Route::post('/login',[LoginController::class,'login']);
// Route::post('/register',[UserController::class,'register']);

// /**API WITH AN UNAUTHORIZED ACCESS WITHOUT  AUTHENTICATION*/
// Route::group(['middleware' => 'auth.jwt','prefix' => 'auth'], function () {
//     Route::post('/logout',[UserController::class,'logout']);
//     Route::get('/users',[UserController::class,'index']);
//     Route::get('/user/{empid}',[UserController::class,'getAuthUser']);

//     Route::apiResource('/systems',SystemController::class);
//     Route::apiResource('/system-access',SystemAccessController::class);
//     Route::apiResource('/roles',RoleController::class);
//     Route::apiResource('/role-access',RoleAccessController::class);
// });
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sprocket_labs\SprocketLabsUser;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::group([

    'middleware' => 'api',

], function () {

    #User Management for SPROCKET LABS USER
    Route::get('getallslusers', [SprocketLabsUser::class, 'getAllSprocketLabsUsers']);
    Route::get('getsluser/{email}', [SprocketLabsUser::class, 'getInfoByEmail']);
    Route::post('addsluser', [SprocketLabsUser::class, 'create']);
    Route::post('updatesluser', [SprocketLabsUser::class, 'edit']);
});
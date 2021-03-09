<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sprocket_labs\SprocketLabsUser;
use App\Http\Controllers\sprocket_labs\ServiceProviderUserController;

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
    Route::get('sprocketlabs/getallslusers', [SprocketLabsUser::class, 'getallsprocketlabusers']);
    Route::get('sprocketlabs/getsluser/{email}', [SprocketLabsUser::class, 'getinfobyemail']);
    Route::post('sprocketlabs/addsluser', [SprocketLabsUser::class, 'create']);
    Route::post('sprocketlabs/updatesluser', [SprocketLabsUser::class, 'edit']);

    #User Management for SERVICE PROVIDER USER UNDER SPROCKET LABS ADMIN USER
    Route::get('sprocketlabs/getallspusers', [ServiceProviderUserController::class, 'getallspuser']);
    Route::get('sprocketlabs/getspuser/{email}', [ServiceProviderUserController::class, 'getinfobyemail']);
    Route::post('sprocketlabs/addspuser', [ServiceProviderUserController::class, 'create']);
    Route::post('sprocketlabs/updatespuser', [ServiceProviderUserController::class, 'edit']);
});
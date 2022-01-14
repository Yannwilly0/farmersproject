<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\apiAuthController;

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

Route::get('/farmers',[ApiController::class, 'getAllFarmers']);
Route::post('/login',[apiAuthController::class, 'login']);
Route::post('/refreshToken',[apiAuthController::class, 'refreshToken']);

Route::group(['middleware'=> ['auth:sanctum']], function() {
    Route::post('/logout',[apiAuthController::class, 'logout']);
    Route::post('/add-farmer',[ApiController::class, 'farmer_registration']);
    Route::post('/add-report',[ApiController::class, 'user_report']);
    Route::post('/add-sale',[ApiController::class, 'user_sales']);

});

/*

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

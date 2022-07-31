<?php

use App\Http\Controllers\API\{Authentication\LoginController,
    Authentication\RegisterController,
    BookingController,
    SearchController};
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
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::group(['middleware' => ['api', 'auth:sanctum']], static function () {
    Route::get('/search/{startPoint}/{endPoint}', [SearchController::class, 'searchForTrips'])
        ->where(['startPoint' => '[0-9]+', 'endPoint' => '[0-9]+']);
    Route::post('/booking', [BookingController::class, 'bookTrip']);
});

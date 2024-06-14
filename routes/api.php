<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\OpenAi\GptChatController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Location\LocationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/')->middleware([])->group(function(){
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/staffs', UserController::class);

    Route::get('/location/countries', [LocationController::class, 'getCountries']);
    Route::get('/location/cities', [LocationController::class, 'getCities']);
    Route::get('/location/districts/{id}', [LocationController::class, 'getDistricts']);
    Route::get('/location/wards/{id}', [LocationController::class, 'getWards']);





    Route::post('/chat-bot', [GptChatController::class, 'gpt']);
    Route::post('/translate', [GptChatController::class, 'translateText']);
});

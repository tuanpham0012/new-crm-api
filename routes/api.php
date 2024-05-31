<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\OpenAi\GptChatController;
use App\Http\Controllers\Department\DepartmentController;

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

    Route::post('/chat-bot', [GptChatController::class, 'gpt']);
    Route::post('/translate', [GptChatController::class, 'translateText']);
});

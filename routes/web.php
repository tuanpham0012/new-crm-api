<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\OpenAi\GptChatController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Department\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.layout');
});

Route::prefix('/')->middleware([])->group(function(){
    Route::get('/departments', [DepartmentController::class, 'view']);
    Route::get('/staffs', [UserController::class, 'view']);
    Route::get('/customers', [CustomerController::class, 'view']);




    Route::get('/chat-bot', [GptChatController::class, 'chatBot']);
});

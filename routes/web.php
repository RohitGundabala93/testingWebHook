<?php

use App\Http\Controllers\EmailWebhookController;
use App\Http\Controllers\GitWebhookController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/add',[TestController::class,'testadd']);

Route::get('/s123adf',[TestController::class,'Sub']);

Route::post('/webhook/email', [EmailWebhookController::class, 'handleWebhook']);
Route::post('/webhook/email', [WebhookController::class, 'handleEmailWebhook']);
Route::post('/webhook/git', [GitWebhookController::class, 'handleGitWebhook']);
// routes/web.php
Route::post('/webhook/git', 'GitWebhookController@handlePush');


<?php

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

use App\Http\Controllers\Topic\TopicController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'topic'], function () {
    Route::get('/', [TopicController::class, 'index']);
    Route::get('/{topicId}', [TopicController::class, 'show']);
    Route::get('/{topicModel}/questions', [TopicController::class, 'questions']);
});

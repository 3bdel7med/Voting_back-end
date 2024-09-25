<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\VoiteController;
use App\Http\Controllers\ContactController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/skill/store',[SkillController::class,'store']);
Route::apiResource('posts',PostController::class);
Route::apiResource('vote',VoiteController::class);
Route::apiResource('contact',ContactController::class);
Route::apiResource('user',UserController::class);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Api\CourseController;
use App\Http\Api\UserController;

//Route::middleware('auth:api')->group(function () {
Route::withoutMiddleware('')->group(function () {
    Route::get('/course', [CourseController::class, 'index']);
    Route::post('/course', [CourseController::class, 'store']);
    Route::get('/course/{id}', [CourseController::class, 'show']);
    Route::put('/course/{id}', [CourseController::class, 'update']);
    Route::delete('/course/{id}', [CourseController::class, 'destroy']);
    Route::get('/users',[UserController::class,'index']);
    Route::get('/user/{id}',[UserController::class,'findById']);
    Route::post('/user',[UserController::class,'store']);
    Route::put('/user/{id}',[UserController::class,'update']);
    Route::delete('/user/{id}',[UserController::class,'destroy']);
});

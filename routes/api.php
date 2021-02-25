<?php

use App\Api\AuthController;
use App\Api\CaptchaController;
use App\Api\HomeController;
use App\Api\SchoolController;
use App\Api\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/captcha', [CaptchaController::class, 'create']);

Route::get('/main', [HomeController::class, 'index']);

Route::apiResource('/school', SchoolController::class);

Route::get('/user/info', [UserController::class, 'info']);

Route::apiResource('/user', UserController::class);

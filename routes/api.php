<?php

use App\Api\AuthController;
use App\Api\CaptchaController;
use App\Api\HomeController;
use App\Api\SchoolController;
use App\Api\UserController;
use App\Api\DepartmentController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/captcha', [CaptchaController::class, 'create']);
// 访问前台
Route::get('/main/index', [HomeController::class, 'index']);

Route::apiResource('/school', SchoolController::class);

Route::get('user/info', [UserController::class, 'info']);

Route::apiResource('/user', UserController::class);

Route::apiResource('/school/{school}/department', DepartmentController::class);

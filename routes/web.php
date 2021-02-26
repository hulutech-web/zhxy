<?php

use Illuminate\Support\Facades\Route;
use App\Api\AuthController;

// Route::get('/', function () {
//     return "欢迎登陆！！网站首页";
// });

Route::get('/', function () {

    return "前台页面^_^";
});


Route::get('{app}', function () {
    return view('app');
})->where('app', 'login|register|admin')->middleware(['guest']);



//后备路由（没有可匹配路由时执行这里）
Route::fallback(function () {
    return view('app');
});

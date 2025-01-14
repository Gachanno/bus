<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/', function () {
    return view('bus-main');
});

Route::get('/bus-reg', function () {
    return view('bus-reg');
});

Route::post('/bus-reg/register', [AuthController::class, 'register']);

Route::post('/bus-reg/login', [AuthController::class, 'login']);
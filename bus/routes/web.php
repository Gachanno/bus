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

Route::get('/admin', function () {
    return view('bus-admin');
});


Route::get('/admin', [AuthController::class, 'showUsers'])->name('admin.users');

Route::delete('/admin/{id}', [AuthController::class, 'deleteUser'])->name('admin.users.delete');

Route::patch('/admin/{id}/toggle-admin', [AuthController::class, 'toggleAdmin'])->name('admin.users.toggleAdmin');

Route::post('/bus-reg/register', [AuthController::class, 'register']);

Route::post('/bus-reg/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


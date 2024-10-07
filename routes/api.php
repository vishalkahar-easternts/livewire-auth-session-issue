<?php

use App\Http\Controllers\API\LoginAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::post('login', [LoginAPIController::class, 'login'])->name('app.login');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

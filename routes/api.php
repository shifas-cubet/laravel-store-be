<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Middleware\EmailVerified;

Route::post('/sign-up', [UserAuthController::class, 'signUp']);

Route::post('/complete-registration', [UserAuthController::class, 'completeRegistration'])
    ->middleware('auth:api');

Route::post('/login', [UserAuthController::class, 'login'])
    ->middleware(EmailVerified::class);

Route::get('/auth-check', [UserAuthController::class, 'test'])
    ->middleware('auth:api');

Route::get('list', [\App\Http\Controllers\ProductController::class, 'list']);

Route::middleware(['auth:api', \App\Http\Middleware\CompleteRegistrationCheck::class])
    ->prefix('products')
    ->group(function () {

});

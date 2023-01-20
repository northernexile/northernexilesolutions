<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (){
   Route::post('register',[RegistrationController::class,'register'])
       ->name('api.auth.register');
   Route::post('login',[LoginController::class,'doLogin'])
       ->name('api.auth.login');
});

<?php

use App\Http\Controllers\CompanyInformationController;
use Illuminate\Support\Facades\Route;

Route::prefix('company')->group(function (){
    Route::get('/',[CompanyInformationController::class,'show'])->name('company.info');
});

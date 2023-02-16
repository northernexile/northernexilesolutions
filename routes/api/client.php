<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

$sectionName = 'client';

Route::prefix('client')->middleware(['auth:sanctum','owner'])->group(function ($request) use($sectionName){



    Route::get('/',[ClientController::class,'index'])->name($sectionName.'.index');
    Route::get('/{id}',[ClientController::class,'show'])->name($sectionName.'.show');
    Route::put('/{id}',[ClientController::class,'update'])->name($sectionName.'.save');
    Route::post('/{id}',[ClientController::class,'create'])->name($sectionName.'.save');
    Route::delete('/',[ClientController::class,'deleteAll'])->name($sectionName.'.delete.all');
    Route::delete('/{id}',[ClientController::class,'delete'])->name($sectionName.'.delete');
    Route::get('/search/{term}',[ClientController::class,'search'])->name($sectionName.'.search');
});

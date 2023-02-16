<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

$sectionName = 'address';

Route::prefix('address')->group(function ($request) use($sectionName){
    Route::get('/',[AddressController::class,'index'])->name($sectionName.'.index');
    Route::get('/{id}',[AddressController::class,'show'])->name($sectionName.'.show');
    Route::patch('/{id}',[AddressController::class,'update'])->name($sectionName.'.save');
    Route::post('',[AddressController::class,'create'])->name($sectionName.'.save');
    Route::delete('/',[AddressController::class,'deleteAll'])->name($sectionName.'.delete.all');
    Route::delete('/{id}',[AddressController::class,'delete'])->name($sectionName.'.delete');
    Route::get('/search/{term}',[AddressController::class,'search'])->name($sectionName.'.search');
});

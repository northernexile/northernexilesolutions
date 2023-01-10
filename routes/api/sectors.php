<?php

use App\Http\Controllers\SectorController;
use Illuminate\Support\Facades\Route;

$sectionName = 'sectors';

Route::prefix($sectionName)->group(function ($request) use ($sectionName){
    Route::get('/search/{term}',[SectorController::class,'search'])->name($sectionName.'.search');
    Route::get('/',[SectorController::class,'index'])->name($sectionName.'.index');
    Route::get('{id}',[SectorController::class,'show'])->name($sectionName.'.show');
    Route::post('/{id}',[SectorController::class,'edit'])->name($sectionName.'.save');
    Route::delete('/{id}',[SectorController::class,'delete'])->name($sectionName.'.delete');
});

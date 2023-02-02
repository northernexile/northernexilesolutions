<?php

use App\Http\Controllers\SectorController;
use Illuminate\Support\Facades\Route;

$sectionName = 'sectors';

Route::prefix($sectionName)->group(function ($request) use ($sectionName){
    $protect = ['auth:sanctum','owner'];

    Route::get('/search/{term}',[SectorController::class,'search'])->name($sectionName.'.search');
    Route::get('/',[SectorController::class,'index'])->name($sectionName.'.index');
    Route::post('/',[SectorController::class,'create'])
        ->middleware($protect)
        ->name($sectionName.'.create');
    Route::get('{id}',[SectorController::class,'show'])->name($sectionName.'.show');
    Route::patch('/{id}',[SectorController::class,'update'])
        ->middleware($protect)
        ->name($sectionName.'.update');
    Route::delete('/{id}',[SectorController::class,'delete'])
        ->middleware($protect)
        ->name($sectionName.'.delete');
});

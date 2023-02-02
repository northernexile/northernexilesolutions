<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ExperienceSectorController;
use Illuminate\Support\Facades\Route;

$sectionName = 'experience';

Route::prefix('experience')->group(function ($request) use($sectionName){

    $subSectionName = '.sector';

    Route::prefix('sector')->middleware(['auth:sanctum','owner'])->group(function ($request) use ($sectionName,$subSectionName){
            Route::get('/',[ExperienceSectorController::class,'index'])->name($sectionName.$subSectionName.'.index');
            Route::get('/{id}',[ExperienceSectorController::class,'show'])->name($sectionName.$subSectionName.'.show');
            Route::put('/{id}',[ExperienceSectorController::class,'update'])->name($sectionName.$subSectionName.'.save');
            Route::post('/{id}',[ExperienceSectorController::class,'create'])->name($sectionName.$subSectionName.'.save');
            Route::delete('/',[ExperienceSectorController::class,'deleteAll'])->name($sectionName.$subSectionName.'.delete.all');
            Route::delete('/{id}',[ExperienceSectorController::class,'delete'])->name($sectionName.$subSectionName.'.delete');
            Route::get('/search/{term}',[ExperienceSectorController::class,'search'])->name($sectionName.$subSectionName.'.search');
    });

    Route::get('/',[ExperienceController::class,'index'])
        ->name($sectionName.'.index')->middleware(['auth:sanctum','owner']);
    Route::get('/{id}',[ExperienceController::class,'show'])
        ->name($sectionName.'.show')
        ->middleware(['auth:sanctum','owner']);
    Route::patch('/{id}',[ExperienceController::class,'update'])
        ->middleware(['auth:sanctum','owner'])
        ->name($sectionName.'.save');
    Route::post('/',[ExperienceController::class,'create'])
        ->middleware(['auth:sanctum','owner'])
        ->name($sectionName.'.save');
    Route::delete('/',[ExperienceController::class,'deleteAll'])
        ->middleware(['auth:sanctum','owner'])
        ->name($sectionName.'.delete.all');
    Route::delete('/{id}',[ExperienceController::class,'delete'])
        ->middleware(['auth:sanctum','owner'])
        ->name($sectionName.'.delete');
    Route::get('/search/{term}',[ExperienceController::class,'search'])
        ->middleware(['auth:sanctum','owner'])
        ->name($sectionName.'.search');
});

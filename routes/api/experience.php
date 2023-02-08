<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ExperienceSectorController;
use App\Http\Controllers\ExperienceSkillController;
use App\Http\Controllers\ExperienceTagController;
use Illuminate\Support\Facades\Route;

$sectionName = 'experience';

Route::prefix('experience')->group(function ($request) use ($sectionName) {

    Route::prefix('sector')->middleware(['auth:sanctum', 'owner'])->group(function ($request) use ($sectionName) {
        $subSectionName = '.sector';
        Route::get('/', [ExperienceSectorController::class, 'index'])->name($sectionName . $subSectionName . '.index');
        Route::get('/{id}', [ExperienceSectorController::class, 'show'])->name($sectionName . $subSectionName . '.show');
        Route::put('/{id}', [ExperienceSectorController::class, 'update'])->name($sectionName . $subSectionName . '.save');
        Route::post('/toggle',[ExperienceSectorController::class,'toggle'])
            ->name($sectionName . $subSectionName . '.toggle');
        Route::post('/', [ExperienceSectorController::class, 'create'])->name($sectionName . $subSectionName . '.save');
        Route::delete('/', [ExperienceSectorController::class, 'deleteAll'])->name($sectionName . $subSectionName . '.delete.all');
        Route::delete('/{id}', [ExperienceSectorController::class, 'delete'])->name($sectionName . $subSectionName . '.delete');
        Route::get('/search/{term}', [ExperienceSectorController::class, 'search'])->name($sectionName . $subSectionName . '.search');
    });


    Route::prefix('skills')->middleware(['auth:sanctum', 'owner'])->group(function ($request) use ($sectionName) {
        $subSectionName = '.skills';
        Route::get('/', [ExperienceSkillController::class, 'index'])->name($sectionName . $subSectionName . '.index');
        Route::get('/{id}', [ExperienceSkillController::class, 'show'])->name($sectionName . $subSectionName . '.show');
        Route::put('/{id}', [ExperienceSkillController::class, 'update'])->name($sectionName . $subSectionName . '.save');
        Route::post('/toggle',[ExperienceSkillController::class,'toggle'])
            ->name($sectionName . $subSectionName . '.toggle');
        Route::post('/{id}', [ExperienceSkillController::class, 'create'])->name($sectionName . $subSectionName . '.save');
        Route::delete('/', [ExperienceSkillController::class, 'deleteAll'])->name($sectionName . $subSectionName . '.delete.all');
        Route::delete('/{id}', [ExperienceSkillController::class, 'delete'])->name($sectionName . $subSectionName . '.delete');
        Route::get('/search/{term}', [ExperienceSkillController::class, 'search'])
            ->name($sectionName . $subSectionName . '.search');
    });

    Route::prefix('tag')->middleware(['auth:sanctum','owner'])->group(function ($request) use($sectionName){
        $subSectionName = '.tag';
        Route::get('/',[ExperienceTagController::class,'index'])->name($sectionName.$subSectionName.'.index');
        Route::get('/{id}',[ExperienceTagController::class,'show'])->name($sectionName.$subSectionName.'.show');
        Route::put('/{id}',[ExperienceTagController::class,'update'])->name($sectionName.$subSectionName.'.save');
        Route::post('/toggle',[ExperienceTagController::class,'toggle'])
            ->name($sectionName . $subSectionName . '.toggle');
        Route::post('/}',[ExperienceTagController::class,'create'])->name($sectionName.$subSectionName.'.save');
        Route::delete('/',[ExperienceTagController::class,'deleteAll'])->name($sectionName.$subSectionName.'.delete.all');
        Route::delete('/{id}',[ExperienceTagController::class,'delete'])->name($sectionName.$subSectionName.'.delete');
        Route::get('/search/{term}',[ExperienceTagController::class,'search'])->name($sectionName.$subSectionName.'.search');
    });

    Route::get('/', [ExperienceController::class, 'index'])
        ->name($sectionName . '.index')->middleware(['auth:sanctum', 'owner']);
    Route::get('/{id}', [ExperienceController::class, 'show'])
        ->name($sectionName . '.show')
        ->middleware(['auth:sanctum', 'owner']);
    Route::patch('/{id}', [ExperienceController::class, 'update'])
        ->middleware(['auth:sanctum', 'owner'])
        ->name($sectionName . '.save');
    Route::post('/', [ExperienceController::class, 'create'])
        ->middleware(['auth:sanctum', 'owner'])
        ->name($sectionName . '.save');
    Route::delete('/', [ExperienceController::class, 'deleteAll'])
        ->middleware(['auth:sanctum', 'owner'])
        ->name($sectionName . '.delete.all');
    Route::delete('/{id}', [ExperienceController::class, 'delete'])
        ->middleware(['auth:sanctum', 'owner'])
        ->name($sectionName . '.delete');
    Route::get('/search/{term}', [ExperienceController::class, 'search'])
        ->middleware(['auth:sanctum', 'owner'])
        ->name($sectionName . '.search');
});

<?php

use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SkillTypesController;
use Illuminate\Support\Facades\Route;

Route::prefix('skills')->group(function (){
    Route::prefix('types')->group(function () {
        Route::get('/',[SkillTypesController::class,'index'])->name('skill.type.index');
        Route::get('/{id}',[SkillTypesController::class,'show'])->name('skill.type.show');
        Route::get('/search/{term}',[SkillTypesController::class,'search'])->name('skill.type.search');
    });

    Route::get('/',[SkillsController::class,'index'])->name('skill.index');
    Route::get('/{id}',[SkillsController::class,'show'])->name('skill.show');
    Route::get('/search/{term}',[SkillsController::class,'search'])->name('skill.search');
});

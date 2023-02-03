<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

$sectionName = 'project';

Route::prefix('project')->middleware(['auth:sanctum','owner'])->group(function ($request) use($sectionName){
    Route::get('/',[ProjectController::class,'index'])->name($sectionName.'.index');
    Route::get('/{id}',[ProjectController::class,'show'])->name($sectionName.'.show');
    Route::put('/{id}',[ProjectController::class,'update'])->name($sectionName.'.save');
    Route::post('/',[ProjectController::class,'create'])->name($sectionName.'.save');
    Route::delete('/',[ProjectController::class,'deleteAll'])->name($sectionName.'.delete.all');
    Route::delete('/{id}',[ProjectController::class,'delete'])->name($sectionName.'.delete');
    Route::get('/search/{term}',[ProjectController::class,'search'])->name($sectionName.'.search');
});
